<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
class ProposeNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('propose_name.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        DB::beginTransaction();
        $new_name = new App\ProposeName;
        try {
            $new_name->contact = $request->change_contact;
            $new_name->contact_social = $request->pick_contact;
            $new_name->new_name = $request->change_name;
            $new_name->desc = $request->change_message;
            $new_name->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/propose_name')->with('error', 'Line : '.$e->getLine().' Something went wrong'.$e->getMessage());
        }

        return redirect('/propose_name')->with('success', 'ขอบคุณทุกความคิดเห็นมาก ๆ ครับ :)');
    }

    public function champooStore(Request $request)
    {
        //dd($request->all());
        DB::beginTransaction();
        $new_name = new App\ProposeName;
        try {
            $new_name->new_name = $request->change_name;
            $new_name->desc = 'Champoo Answer';
            $new_name->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/propose_name_for_champoo')->with('error', 'Line : '.$e->getLine().' Something went wrong'.$e->getMessage());
        }

        return redirect('/propose_name_for_champoo')->with('success', 'Thank you :)');
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
        //
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
        //
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
            $feedback = App\Feedback::find($id);
            $feedback->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $res_message = 'fail : '.$e->getMessage();
        }
        return $res_message;
    }

    public function showChampoo()
    {
        
        $propose_name = App\ProposeName::where('desc', '<>', 'Champoo Answer')->get();
        
        return view('propose_name.show', compact('propose_name'));
    }
}
