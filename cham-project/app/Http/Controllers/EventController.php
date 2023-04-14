<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;
use DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.event.list');
    }

    public function getDatatables(Request $request) {

        /*$filter_model = $request->filter_model; 
        $filter_comp = $request->filter_comp; 
        $filter_serial = $request->filter_serial; */

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length; // Rows display per page

        $column_index_arr = $request->order;
        $column_name_arr = $request->columns;
        $search_arr = $request->search;

        $search_value = $search_arr['value']; // Search value

        $event_list = new App\Event;

        /*if ($request->filter_txt_sup)
        {
            $event_list = $event_list->Where('dealer_id', $request->filter_txt_sup);
        }

        if ($filter_model)
        {
            $dv_so_line = App\DV_SO_Lineitem::where('model_id', $filter_model)->pluck('dv_id');
            
            if (count($dv_so_line) == 0) {
                $dv_list = $dv_list->Where('id','0');
            }
            if (count($dv_so_line) != 0) {
                $dv_list = $dv_list->WhereIn('id', $dv_so_line);
            }

        }

        if ($filter_comp)
        {
            $so_list = App\Sale_order::where('company_id', $filter_comp)->pluck('id');
            $dv_list = $dv_list->WhereIn('so', $so_list);
            
        }
        if ($filter_serial) {
            $product_id = App\Product::where("serial", "like", "%$filter_serial%")->withTrashed()->pluck('id');
            $dv_head_id = App\Dv_lineitem_log::whereIn("product_id", $product_id)->pluck('dv_head_id');
            $dv_list = $dv_list->whereIn('id', $dv_head_id);

        }*/

        if ($search_value) {
            $event_list = $event_list->where(function ($query) use ($search_value) {
                $query->where('name', "like", "%$search_value%");
            });
        }

        if (!empty($column_index_arr)) {
            $column_index = $column_index_arr[0]['column']; // Column index
            $column_name = $column_name_arr[$column_index]['data']; // Column name
            $column_sort_order = $column_index_arr[0]['dir']; // asc or desc

            $event_list = $event_list->orderBy($column_name, $column_sort_order);
        }
        if (empty($column_index_arr)) {
            $event_list = $event_list->orderByRaw('date(start_date) DESC');
        }

         // Total records
        $totalRecords = App\Event::select('count(*) as allcount')->count();
        $temp_record_list = $event_list;
        $totalRecordswithFilter = $temp_record_list->count();

        $event_list = $event_list->offset($start)->limit($length)->get();

        $send_data = [];
        $row_num = $start+1;
        foreach ($event_list as $event)
        {
            $data = [];
            $data['num_inx'] = number_format($row_num, 0, '.', ',');
            $data['id'] = $event->id;
            $data['name'] = $event->name;
            $data['start_date'] = Carbon::parse(explode(" ", $event->start_date) [0])->format('d/m/Y');
            $data['end_date'] = Carbon::parse(explode(" ", $event->end_date) [0])->format('d/m/Y');
            array_push($send_data, $data);
            $row_num++;
        }
        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecordswithFilter,
            "data" => $send_data
        ); 
        return json_encode($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.add');
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
        $request->validate([
            'event_name' => 'required',
            'start_date' => 'required',
        ]);

        DB::beginTransaction();
        $event = new App\Event;
        try {
            $event->name = $request->event_name;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->img_path = $request->img_path;
            $event->url = $request->url;
            $event->desc = $request->desc;
            $event->created_user_id = $event->updated_user_id = Auth::user()->id;
            $event->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/event/create')->with('error', 'Line : '.$e->getLine().' Something went wrong'.$e->getMessage());
        }

        return redirect('admin/event')->with('success', 'Success add event : '.$event->name.'.');
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
        //
    }
}
