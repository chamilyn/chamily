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
        return view('admin.saving.list', ['savings'=>$savings, 'count'=>$count]);
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
            $saving_lineitem->amount = number_format($request->amount, 2);
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
        return view('admin.saving.lineitem.list', ['saving' => $saving, 'saving_lineitems' => $saving_lineitems, 'count' => $count]);
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
            $saving_lineitem->amount = number_format($request->amount, 2);
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
}
