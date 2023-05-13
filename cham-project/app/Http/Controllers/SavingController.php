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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
