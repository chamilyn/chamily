<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RecordIamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('record_iam.add');
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

    public function downloadLink(Request $request) {
        //dd($request->all());
        $res = (object)[];
        $res->success = 1;
        $res->data = [];
        try {
            $url = $request->url; // Replace with the actual URL

            $client = new Client();
            $response = $client->get($url);
            $html = $response->getBody()->getContents();

            $ogImage = null;
            preg_match('/<meta\s+property="og:image"\s+content="([^"]+)"/i', $html, $matches);

            if (isset($matches[1])) {
                $ogImage = $matches[1];
            }
            if ($ogImage) {
                array_push($res->data, $ogImage);
            } else {
                $res->success = 0;
            }
        } catch (\Throwable $th) {
            $res->success = 0;
        }
        return response()->json($res);
    }
}
