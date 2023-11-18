<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;
use DB;
use DateTime;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $events = App\Event::orderBy('start_date', 'desc')->paginate(10);
        $event_count = App\Event::all();
        $count = $event_count->count();
        return view('admin.event.list', ['events'=>$events, 'count'=>$count]);
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
        //dd(storage_path('app'));
        //dd($request->all());
        $request->validate([
            'event_name' => 'required',
            'start_date' => 'required',
            'img_path' => 'mimes:jpg,png'
        ], [
            'img_path.mimes' => 'The file must be of type jpg or png.'
        ]);

        DB::beginTransaction();
        $event = new App\Event;
        try {
            $event->name = $request->event_name;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->url = $request->url;
            $event->desc = $request->desc;
            $event->created_user_id = $event->updated_user_id = Auth::user()->id;
            $event->save();
            //upload img
            if ($request->hasFile('img_path')) {
                $destination_path = 'public/events';
                $file = $request->file('img_path');
                $extension = $file->getClientOriginalExtension();
                $file_name = 'event_' . $event->id.'.'.$extension;
                $path = $request->file('img_path')->storeAs($destination_path, $file_name);
                $event->img_path = $file_name;
                $event->save();
            }
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
        $event = App\Event::find($id);
        return view('admin/event/add', ['event' => $event]);
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
        //dd($request->all());
        $request->validate([
            'event_name' => 'required',
            'start_date' => 'required',
        ]);

        DB::beginTransaction();
        $event = App\Event::find($id);
        try {
            $event->name = $request->event_name;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->url = $request->url;
            $event->desc = $request->desc;
            $event->updated_user_id = Auth::user()->id;
            //upload img
            if ($request->hasFile('img_path')) {
                $destination_path = 'public/events';
                $file = $request->file('img_path');
                $extension = $file->getClientOriginalExtension();
                $file_name = 'event_' . $event->id.'.'.$extension;
                $path = $request->file('img_path')->storeAs($destination_path, $file_name);
                $event->img_path = $file_name;
            }
            $event->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/event')->with('error', 'Line : '.$e->getLine().' Something went wrong'.$e->getMessage());
        }

        return redirect('admin/event')->with('success', 'Success update event : '.$event->name.'.');
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
            $event = App\Event::find($id);
            if ($event->img_path) {
                $delPath = public_path('storage'.DIRECTORY_SEPARATOR.'events');
                unlink($delPath.DIRECTORY_SEPARATOR.$event->img_path);
            }
            $event->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $res_message = 'fail : '.$e->getMessage();
        }
        return $res_message;
    }

    public function clientIndex()
    {
        return view('event.event');
    }

    public function getEventSchedules() 
    {
        $event_list = [];
        $from = new DateTime("-6 months");
        $to = new DateTime("6 months");
        $from_year = intval($from->format('Y'));
        $to_year = intval($to->format('Y'));
        $from_month = intval($from->format('m'));
        $to_month = intval($to->format('m'));
        $event_list[intval($from->format('Y'))] = [];
        $event_list[intval($to->format('Y'))] = [];
        if ($from_year != $to_year) {
            $to_month += 12;
        }
        $add_year = 0;
        for ($int_month = $from_month; $int_month<=$to_month; $int_month++) {
            $event_list[$from_year][($int_month%13) + $add_year] = [];
            if ($int_month == 12) {
                $from_year++;
                $add_year = 1;
            }
        }
        $events = App\Event::whereBetween('start_date', [now()->subMonths(6), now()->addMonths(6)])
        ->orderBy('start_date', 'desc')
        ->get();
        foreach ($events as $event) {
            if ($event->end_date == null) {
                $event->end_date = $event->start_date;
            }
            $event->build_date = $this->buildDateRangeString($event->start_date,$event->end_date);
            $start_year = intval(date('Y', strtotime($event->start_date)));
            $start_month = intval(date('m', strtotime($event->start_date)));
            $tmp_events = $event_list[$start_year][$start_month];
            array_push($tmp_events, $event);
            $event_list[$start_year][$start_month] = $tmp_events;
            if ($event->start_date != $event->end_date) {
                $end_year = intval(date('Y', strtotime($event->end_date)));
                $end_month = intval(date('m', strtotime($event->end_date)));
                if ($start_month == 12) {
                    $start_month = 1;
                    $start_year++;
                } else {
                    $start_month++;
                }
                while (($start_month <= $end_month || $start_year < $end_year) && !isset($event_list[$start_year][$start_month])) {
                    $tmp_events = $event_list[$start_year][$start_month];
                    
                    array_push($tmp_events, $event);
                    $event_list[$start_year][$start_month] = $tmp_events;
                    if ($start_month == 12 && $start_year < $end_year) {
                        $start_month = 1;
                        $start_year++;
                    } else {
                        $start_month++;
                    }
                }
            }
        }
        return $event_list;
    }

    function buildDateRangeString($startDate, $endDate) {
        $startMonth = date('M', strtotime($startDate));
        $endMonth = date('M', strtotime($endDate));
    
        // If the start month is the same as the end month
        if ($startMonth === $endMonth) {
            $startDay = date('j', strtotime($startDate));
            $endDay = date('j', strtotime($endDate));
            $startYear = date('Y', strtotime($startDate));
    
            // If the start day and end day are the same
            if ($startDay === $endDay) {
                return "{$startDay} {$startMonth} {$startYear}";
            } else {
                return "{$startDay}-{$endDay} {$startMonth} {$startYear}";
            }
        } else {
            $startDay = date('j', strtotime($startDate));
            $endDay = date('j', strtotime($endDate));
            $startYear = date('Y', strtotime($startDate));
            $endYear = date('Y', strtotime($endDate));
    
            return "{$startDay} {$startMonth} {$startYear} - {$endDay} {$endMonth} {$endYear}";
        }
    }
}
