<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;
use DB;
use DateTime;
class WishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storeLineitem(Request $request)
    {
        DB::beginTransaction();
        $wishing_lineitem = new App\WishingLineitem;
        try {
            if (!$request->wishing_id) {
                return false;
            }
            $wishing_lineitem->wishing_id = $request->wishing_id;
            $wishing_lineitem->wish = $request->wish;
            $wishing_lineitem->save();
           
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $wishing_id = null;
        $wishing_name = 'lip_gloss';
        $wishing = App\Wishing::where('name', $id)->first();
        if  ($wishing) {
            $wishing_id = $wishing->id;
            $wishing_name = $wishing->name;
        }
        return view('wishing.'.$wishing_name.'.add', compact('wishing_id'));
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
        //
    }
}
