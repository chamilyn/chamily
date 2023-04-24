<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = App\Feedback::orderBy('created_at', 'desc')->paginate(10);
        $feedback_count = App\Feedback::all();
        $count = $feedback_count->count();
        return view('admin.feedback.list', ['feedbacks'=>$feedbacks, 'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedback.add');
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
            'feedback_message' => 'required'
        ]);

        DB::beginTransaction();
        $feedback = new App\Feedback;
        try {
            if ($request->feedback_name) {
                $feedback->name = $request->feedback_name;
            }
            $feedback->message = $request->feedback_message;
            $feedback->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/feedbacks')->with('error', 'Line : '.$e->getLine().' Something went wrong'.$e->getMessage());
        }

        return redirect('/feedbacks')->with('success', 'ขอบคุณทุกการสนับสนุนให้พวกเรา :)');
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
}
