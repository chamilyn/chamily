<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;
use DB;
use DateTime;

class SavingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $savings = App\Saving::orderBy('created_at', 'desc')->paginate(10);
        $saving_count = App\Saving::all();
        $count = $saving_count->count();

        $current_month = intval(date("m"));
        $current_month_text = $this->convertIntMonthToString($current_month);
        $current_year = intval(date("Y"));
        $current_month_year = $current_month_text.' '.($current_year<2500?$current_year+543 : $current_year);

        $saving_lineitem_total = App\SavingLineitem::selectRaw('SUM(tbl_saving_lineitems.amount) as total_amount')
        //->join('users', 'tbl_saving_lineitems.transfer_id', "=", "users.id")
        //->where("saving_code", Auth::user()->saving_code)
        //->groupBy('saving_code')
        //->orderBy('total_amount', 'DESC')
        ->first();
        $total_amount = 0;
        if ($saving_lineitem_total) {
            $total_amount = $saving_lineitem_total->total_amount;
        }

        $top_spenders = App\SavingLineitem::selectRaw('SUM(tbl_saving_lineitems.amount) as total_amount, users.saving_code as saving_code')
        ->join('users', 'tbl_saving_lineitems.transfer_id', "=", "users.id")
        ->whereYear("transfer_date", $current_year)
        ->whereMonth("transfer_date", $current_month)
        ->groupBy('saving_code')
        ->orderBy('total_amount', 'DESC')
        ->limit(10)
        ->get();

        $saving_lineitems = App\SavingLineitem::selectRaw('SUM(tbl_saving_lineitems.amount) as total_amount, users.saving_code as saving_code')
        ->join('users', 'tbl_saving_lineitems.transfer_id', "=", "users.id")
        //->whereYear("transfer_date", $current_year)
        //->whereMonth("transfer_date", $current_month)
        //->where("saving_code", Auth::user()->saving_code)
        ->groupBy('saving_code')
        ->orderBy('total_amount', 'DESC')
        ->get();
        
        return view('admin.saving.list', compact('savings', 'count', 'total_amount', 'current_month_year', 'top_spenders', 'saving_lineitems'));
    }

    public function info()
    {
        return view('kongtun.info');
    }

    public function summary()
    {
        if (!Auth::user()) {
            return redirect('/kongtun/login');
        }

        $current_month = intval(date("m"));
        $current_month_text = $this->convertIntMonthToString($current_month);
        $current_year = intval(date("Y"));
        $current_month_year = $current_month_text.' '.($current_year<2500?$current_year+543 : $current_year);

        $saving_lineitem_total = App\SavingLineitem::selectRaw('SUM(tbl_saving_lineitems.amount) as total_amount, users.saving_code as saving_code')
        ->join('users', 'tbl_saving_lineitems.transfer_id', "=", "users.id")
        ->where("saving_code", Auth::user()->saving_code)
        ->groupBy('saving_code')
        ->orderBy('total_amount', 'DESC')
        ->first();
        $total_amount = 0;
        if ($saving_lineitem_total) {
            $total_amount = $saving_lineitem_total->total_amount;
        }

        $top_spenders = App\SavingLineitem::selectRaw('SUM(tbl_saving_lineitems.amount) as total_amount, users.saving_code as saving_code')
        ->join('users', 'tbl_saving_lineitems.transfer_id', "=", "users.id")
        ->whereYear("transfer_date", $current_year)
        ->whereMonth("transfer_date", $current_month)
        ->groupBy('saving_code')
        ->orderBy('total_amount', 'DESC')
        ->limit(10)
        ->get();

        $saving_lineitem_months = App\SavingLineitem::selectRaw('SUM(tbl_saving_lineitems.amount) as total_amount, users.saving_code as saving_code
        , YEAR(tbl_saving_lineitems.transfer_date) as transfer_year, MONTH(tbl_saving_lineitems.transfer_date) as transfer_month')
        ->join('users', 'tbl_saving_lineitems.transfer_id', "=", "users.id")
        //->whereYear("transfer_date", $current_year)
        //->whereMonth("transfer_date", $current_month)
        ->where("saving_code", Auth::user()->saving_code)
        ->groupBy('saving_code', 'transfer_year', 'transfer_month')
        ->orderBy('transfer_year', 'DESC')
        ->orderBy('transfer_month', 'DESC')
        ->get();
        $data_months = [];
        foreach ($saving_lineitem_months as $saving_lineitem_month) {
            $data_month = (object)[];
            $data_month->year = ($saving_lineitem_month->transfer_year<2500?$saving_lineitem_month->transfer_year+543 : $saving_lineitem_month->transfer_year);
            $data_month->month = $this->convertIntMonthToString($saving_lineitem_month->transfer_month);
            $data_month->amount = $saving_lineitem_month->total_amount;
            array_push($data_months, $data_month);
        }
        return view('kongtun.summary', compact('current_month_year', 'top_spenders', 'total_amount', 'data_months'));
    }

    public function login()
    {
        if (Auth::user()) {
            return redirect('/kongtun/summary');
        } else {
            return view('kongtun.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.saving.add');
    }

    public function createLineitem($id)
    {
        $saving = App\Saving::find($id);
        $transfers = App\User::where('saving_code', '<>', null)->orderBy('saving_code', 'ASC')->get();
        return view('admin.saving.lineitem.add', ['saving' => $saving, 'transfers' => $transfers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'saving_name' => 'required'
        ]);

        DB::beginTransaction();
        $saving = new App\Saving;
        try {
            $saving->name = $request->saving_name;
            $saving->note = $request->note;
            $saving->created_user_id = $saving->updated_user_id = Auth::user()->id;
            $saving->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/savings/create')->with('error', 'Line : '.$e->getLine().' Something went wrong'.$e->getMessage());
        }

        return redirect('admin/savings')->with('success', 'Success add saving : '.$saving->name.'.');
    }

    public function storeLineitem(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'transfer_date' => 'required',
            'saving_id' => 'required',
            'amount' => 'required',
            'img_path' => 'mimes:jpg,png'
        ], [
            'img_path.mimes' => 'The file must be of type jpg or png.'
        ]);

        DB::beginTransaction();
        $saving_lineitem = new App\SavingLineitem;
        try {
            $saving_lineitem->transfer_id = $request->transfer_selected;
            $saving_lineitem->transfer_date = $request->transfer_date;
            $saving_lineitem->amount = $request->amount;
            $saving_lineitem->saving_id = $request->saving_id;
            $saving_lineitem->note = $request->note;
            $saving_lineitem->created_user_id = $saving_lineitem->updated_user_id = Auth::user()->id;
            $saving_lineitem->save();
            //upload img
            if ($request->hasFile('img_path')) {
                $destination_path = 'public/savings';
                $file = $request->file('img_path');
                $extension = $file->getClientOriginalExtension();
                $file_name = 'saving_' . $saving_lineitem->id.'.'.$extension;
                $path = $request->file('img_path')->storeAs($destination_path, $file_name);
                $saving_lineitem->img_path = $file_name;
                $saving_lineitem->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/savings/'.$request->saving_id.'/lineitem/create')->with('error', 'Line : '.$e->getLine().' Something went wrong'.$e->getMessage());
        }

        return redirect('admin/savings/'.$request->saving_id)->with('success', 'Success create saving.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saving = App\Saving::find($id);
        $saving_lineitems = App\SavingLineitem::where('saving_id', $id)->orderBy('created_at', 'desc')->paginate(10);
        $saving_lineitem_count = App\SavingLineitem::where('saving_id', $id)->get();
        $count = $saving_lineitem_count->count();

        $current_month = intval(date("m"));
        $current_month_text = $this->convertIntMonthToString($current_month);
        $current_year = intval(date("Y"));
        $current_month_year = $current_month_text.' '.($current_year<2500?$current_year+543 : $current_year);

        $saving_lineitem_total = App\SavingLineitem::selectRaw('SUM(tbl_saving_lineitems.amount) as total_amount')
        //->join('users', 'tbl_saving_lineitems.transfer_id', "=", "users.id")
        //->where("saving_code", Auth::user()->saving_code)
        //->groupBy('saving_code')
        //->orderBy('total_amount', 'DESC')
        ->first();
        $total_amount = 0;
        if ($saving_lineitem_total) {
            $total_amount = $saving_lineitem_total->total_amount;
        }

        $top_spenders = App\SavingLineitem::selectRaw('SUM(tbl_saving_lineitems.amount) as total_amount, users.saving_code as saving_code')
        ->join('users', 'tbl_saving_lineitems.transfer_id', "=", "users.id")
        ->whereYear("transfer_date", $current_year)
        ->whereMonth("transfer_date", $current_month)
        ->groupBy('saving_code')
        ->orderBy('total_amount', 'DESC')
        ->limit(10)
        ->get();

        $saving_lineitem_tops = App\SavingLineitem::selectRaw('SUM(tbl_saving_lineitems.amount) as total_amount, users.saving_code as saving_code')
        ->join('users', 'tbl_saving_lineitems.transfer_id', "=", "users.id")
        //->whereYear("transfer_date", $current_year)
        //->whereMonth("transfer_date", $current_month)
        //->where("saving_code", Auth::user()->saving_code)
        ->groupBy('saving_code')
        ->orderBy('total_amount', 'DESC')
        ->get();

        return view('admin.saving.lineitem.list', compact('saving', 'saving_lineitems', 'count', 'current_month_year', 'top_spenders', 'saving_lineitem_tops'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $saving = App\Saving::find($id);
        return view('admin.saving.add', ['saving' => $saving]);
    }

    public function editLineitem($id, $lineitem_id)
    {
        $saving = App\Saving::find($id);
        $saving_lineitem = App\SavingLineitem::find($lineitem_id);
        $transfers = App\User::where('saving_code', '<>', null)->orderBy('saving_code', 'ASC')->get();
        return view('admin.saving.lineitem.add', ['saving_lineitem' => $saving_lineitem, 'saving' => $saving, 'transfers' => $transfers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'saving_name' => 'required',
        ]);

        DB::beginTransaction();
        $saving = App\Saving::find($id);
        try {
            $saving->name = $request->saving_name;
            $saving->note = $request->note;
            $saving->updated_user_id = Auth::user()->id;
            $saving->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/savings')->with('error', 'Line : '.$e->getLine().' Something went wrong'.$e->getMessage());
        }

        return redirect('admin/savings')->with('success', 'Success update saving : '.$saving->name.'.');
    }

    public function updateLineitem(Request $request, $id, $lineitem_id)
    {
        $request->validate([
            'transfer_date' => 'required',
            'saving_id' => 'required',
            'amount' => 'required',
            'img_path' => 'mimes:jpg,png'
        ]);

        DB::beginTransaction();
        $saving_lineitem = App\SavingLineitem::find($lineitem_id);
        try {
            $saving_lineitem->transfer_id = $request->transfer_selected;
            $saving_lineitem->transfer_date = $request->transfer_date;
            $saving_lineitem->amount = $request->amount;
            $saving_lineitem->saving_id = $request->saving_id;
            $saving_lineitem->note = $request->note;
            $saving_lineitem->updated_user_id = Auth::user()->id;
            $saving_lineitem->save();
            //upload img
            if ($request->hasFile('img_path')) {
                $destination_path = 'public/savings';
                $file = $request->file('img_path');
                $extension = $file->getClientOriginalExtension();
                $file_name = 'saving_' . $saving_lineitem->id.'.'.$extension;
                $path = $request->file('img_path')->storeAs($destination_path, $file_name);
                $saving_lineitem->img_path = $file_name;
            }
            $saving_lineitem->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/savings/'.$id.'/lineitem/'.$lineitem_id.'/edit')->with('error', 'Line : '.$e->getLine().' Something went wrong'.$e->getMessage());
        }

        return redirect('admin/savings/'.$id)->with('success', 'Success update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res_message = 'success';
        try {
            $saving = App\Saving::find($id);
            //delete lineitem
            $saving_lineitems = App\SavingLineitem::where('saving_id', $id)->delete();
            $saving->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $res_message = 'fail : '.$e->getMessage();
        }
        return $res_message;
    }

    public function destroyLineitem($id, $lineitem_id)
    {
        $res_message = 'success';
        try {
            $saving_lineitems = App\SavingLineitem::where('id', $lineitem_id)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $res_message = 'fail : '.$e->getMessage();
        }
        return $res_message;
    }

    public function convertIntMonthToString($month) 
    {
        if ($month == 1) {
            return 'มกราคม';
        } elseif ($month == 2) {
            return 'กุมพาพันธ์';
        } elseif ($month == 3) {
            return 'มีนาคม';
        } elseif ($month == 4) {
            return 'เมษายน';
        } elseif ($month == 5) {
            return 'พฤษภาคม';
        } elseif ($month == 6) {
            return 'มิถุนายน';
        } elseif ($month == 7) {
            return 'กรกฎาคม';
        } elseif ($month == 8) {
            return 'สิงหาคม';
        } elseif ($month == 9) {
            return 'กันยายน';
        } elseif ($month == 10) {
            return 'ตุลาคม';
        } elseif ($month == 11) {
            return 'พฤจิกายน';
        } else {
            return 'ธันวาคม';
        }
    }
}
