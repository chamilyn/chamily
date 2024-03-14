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
            $split_url = explode("/", $url);
            $count_split_url = count($split_url);
            $file_name = $split_url[$count_split_url - 1];
            $content = $split_url[$count_split_url - 2];
            
            if ($content == 'content-member-timeline' || $content == 'content-member-batch-thankyou') {
                $url = "https://public.bnk48.io/timeline/".$content."/".$file_name;
                $client = new Client();
                $response = $client->get($url);
                $jsonResponse = json_decode($response->getBody()); // Decode the JSON response
                if ($jsonResponse && $jsonResponse->content && $jsonResponse->content->imageFileUrl && count($jsonResponse->content->imageFileUrl) > 0) {
                    $imageFileUrls = $jsonResponse->content->imageFileUrl;
                    foreach ($imageFileUrls as $key => $image) {
                        $imageData = file_get_contents($image);
                        $base64Image = base64_encode($imageData);
                        $imageSize = getimagesizefromstring($imageData);
                        $imageFormat = image_type_to_mime_type($imageSize[2]);
                        $base64Image = 'data:' . $imageFormat . ';base64,' . $base64Image;
                        $extension = 'jpg';
                        if ($imageFormat === 'image/png') {
                            $extension = 'png';
                        }
                        $obj_image = (object)[];
                        $obj_image->url = $image;
                        $obj_image->image = $base64Image;
                        $obj_image->file_name = $file_name.'_'.($key+1).'.'.$extension;
                        array_push($res->data, $obj_image);
                    }
                } else {
                    $res->success = 0;
                }
                
                /*$is_continue = true;
                $running_name = 1;
                while ($is_continue) {
                    $pattern = '/<div class="row no-gutters">(.*?)<\/div>/s'; // Match the specific <div>
                    // Perform the regex match
                    if (preg_match($pattern, $html, $matches)) {
                        $divContent = $matches[1]; // Get the content of the matched <div>
                        //array_push($res->data, $matches);
                        // Define the regex pattern to match all <img> tags within the <div>
                        $imgPattern = '/<img.*?src=["\']([^"\']+)["\']/';

                        // Perform the regex match to extract src attributes of all <img> tags
                        if (preg_match_all($imgPattern, $divContent, $imgMatches)) {
                            $imageSrcArray = $imgMatches[1]; // Extracted src attributes
                            //$res->data = $imageSrcArray;
                            foreach ($imageSrcArray as $key => $image) {
                                //$imageSrcArray[] = $src;
                                $imageData = file_get_contents($image);
                                $base64Image = base64_encode($imageData);
                                $imageSize = getimagesizefromstring($imageData);
                                $imageFormat = image_type_to_mime_type($imageSize[2]);
                                $base64Image = 'data:' . $imageFormat . ';base64,' . $base64Image;
                                $extension = 'jpg';
                                if ($imageFormat === 'image/png') {
                                    $extension = 'png';
                                }
                                $obj_image = (object)[];
                                $obj_image->url = $image;
                                $obj_image->image = $base64Image;
                                $obj_image->file_name = $file_name.'_'.$running_name.'.'.$extension;
                                array_push($res->data, $obj_image);
                                $running_name++;
                            }
                        } else {
                            $urlPattern = '/url\(\'([^\']+)\'\)/';
                            // Perform the regex match to extract the URL within url('...')
                            if (preg_match($urlPattern, $divContent, $imgMatches)) {
                                $imageSrcArray = $imgMatches[1];
                                $imageData = file_get_contents($imageSrcArray);
                                $base64Image = base64_encode($imageData);
                                $imageSize = getimagesizefromstring($imageData);
                                $imageFormat = image_type_to_mime_type($imageSize[2]);
                                $base64Image = 'data:' . $imageFormat . ';base64,' . $base64Image;
                                $extension = 'jpg';
                                if ($imageFormat === 'image/png') {
                                    $extension = 'png';
                                }
                                $obj_image = (object)[];
                                $obj_image->url = $imageSrcArray;
                                $obj_image->image = $base64Image;
                                $obj_image->file_name = $file_name.'_'.$running_name.'.'.$extension;
                                array_push($res->data, $obj_image);
                                $running_name++;

                            } else {
                                $is_continue = false;
                            }
                            
                        }
                    } else {
                        $is_continue = false;
                        if ($running_name == 1) {
                            $res->success = 0;
                        }
                    }
                    $html = str_replace($divContent.'</div>', "", $html);
                    
                }*/
            } else {
                $client = new Client();
                $response = $client->get($url);
                $html = $response->getBody()->getContents();
                $ogImage = null;
                preg_match('/<meta\s+property="og:image"\s+content="([^"]+)"/i', $html, $matches);
                if (isset($matches[1])) {
                    $ogImage = $matches[1];
                }
                if ($ogImage) {
                    $imageData = file_get_contents($ogImage);
                    $base64Image = base64_encode($imageData);
                    $imageSize = getimagesizefromstring($imageData);
                    $imageFormat = image_type_to_mime_type($imageSize[2]);
                    $base64Image = 'data:' . $imageFormat . ';base64,' . $base64Image;
                    $extension = 'jpg';
                    if ($imageFormat === 'image/png') {
                        $extension = 'png';
                    }
                    $obj_image = (object)[];
                    $obj_image->url = $ogImage;
                    $obj_image->image = $base64Image;
                    $obj_image->file_name = $file_name.'_1.'.$extension;
                    array_push($res->data, $obj_image);
                } else {
                    $res->success = 0;
                }
            }
        } catch (\Throwable $th) {
            $res->success = 0;
            $res->message = 'Error Line : '.$th->getLine().' Something went wrong'.$th->getMessage();
        }
        return response()->json($res);
    }
}
