<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DateTime;
use GuzzleHttp\Client;
use App\Http\Controllers\CallApiController;

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

    public function adminIndex()
    {
        return view('admin.record_iam.add');
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

    public function AdminDownloadLink(Request $request) {
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
                //case text
                if ($jsonResponse && $jsonResponse->content && !$jsonResponse->content->imageFileUrl && !$jsonResponse->content->thumbImageUrl) {
                    $data = (object)[];
                    $date = new DateTime($jsonResponse->content->postedAt);
                    // Format the date as dd.mm.yyyy
                    $postedAt = $date->format('d.m.Y');
                    // Message body template
                    $messageBody = "[".$postedAt."] 𝗖𝗵𝗮𝗺𝗽𝗼𝗼𝗖𝗚𝗠𝟰𝟴\n🔸iAM48 Application Post\n\n";
                    $messageBody .= $this->replacePostMemberName($jsonResponse->content->contentText);
                    $messageBody .= "\n\n°.♡┈┈∘ #CGM48\n#ChampooCGM48 ∘┈┈♡.°";
                    $data->message = $messageBody;
                    $response = CallApiController::callLineNotify($data);
                } elseif ($jsonResponse && $jsonResponse->content && $jsonResponse->content->imageFileUrl && count($jsonResponse->content->imageFileUrl) > 0) { //case image
                    $data = (object)[];
                    $date = new DateTime($jsonResponse->content->postedAt);
                    // Format the date as dd.mm.yyyy
                    $postedAt = $date->format('d.m.Y');
                    // Message body template
                    $messageBody = "[".$postedAt."] 𝗖𝗵𝗮𝗺𝗽𝗼𝗼𝗖𝗚𝗠𝟰𝟴\n🔸iAM48 Application Post\n\n";
                    $messageBody .= $this->replacePostMemberName($jsonResponse->content->contentText);
                    $messageBody .= "\n\n°.♡┈┈∘ #CGM48\n#ChampooCGM48 ∘┈┈♡.°";
                    $data->message = $messageBody;
                    $response = CallApiController::callLineNotify($data);

                    $imageFileUrls = $jsonResponse->content->imageFileUrl;
                    foreach ($imageFileUrls as $key => $image) {
                        $data = (object)[];
                        $data->message = "image : ".($key+1);
                        $data->imageThumbnail = $image;
                        $data->imageFullsize = $image;
                        $response = CallApiController::callLineNotify($data);
                    }
                } elseif ($jsonResponse && $jsonResponse->content && $jsonResponse->content->thumbImageUrl) { //case vdo
                    $data = (object)[];
                    $date = new DateTime($jsonResponse->content->postedAt);
                    $vdo_url = CallApiController::getIamVdoUrl($file_name);
                    // Format the date as dd.mm.yyyy
                    $postedAt = $date->format('d.m.Y');
                    // Message body template
                    $messageBody = "[".$postedAt."] 𝗖𝗵𝗮𝗺𝗽𝗼𝗼𝗖𝗚𝗠𝟰𝟴\n🔸iAM48 Application Post\n\n";
                    $messageBody .= $this->replacePostMemberName($jsonResponse->content->contentText);
                    $messageBody .= "\n\n°.♡┈┈∘ #CGM48\n#ChampooCGM48 ∘┈┈♡.°";
                    $data->message = $messageBody;
                    $response = CallApiController::callLineNotify($data);

                    if ($vdo_url) {
                        $data = (object)[];
                        $data->message = $vdo_url;
                        $response = CallApiController::callLineNotify($data);
                    }
                    

                } else {
                    $res->success = 0;
                }
            } else {
                if ($content == 'schedule-member-live' || $content == 'member-live') {
                    $url = "https://public.bnk48.io/timeline/schedule-member-live/".$file_name;
                } else {
                    $url = "https://public.bnk48.io/timeline/content-member-live-playback/".$file_name;
                }
                $client = new Client();
                $response = $client->get($url);
                $jsonResponse = json_decode($response->getBody());
                if ($jsonResponse && isset($jsonResponse->content) && $jsonResponse->content->thumbImageUrl) {
                    $data = (object)[];
                    $date = new DateTime($jsonResponse->content->postedAt);
                    // Format the date as dd.mm.yyyy
                    $postedAt = $date->format('d.m.Y');
                    // Message body template
                    $messageBody = "[".$postedAt."] 𝗖𝗵𝗮𝗺𝗽𝗼𝗼𝗖𝗚𝗠𝟰𝟴\n🔸iAM48 Application Live\n\n";
                    $messageBody .= $this->replacePostMemberName($jsonResponse->content->contentText);
                    $messageBody .= "\n\nรับชมย้อนหลังได้ที่ : https://app.bnk48.com/member-playback/".$file_name;
                    $messageBody .= "\n\n°.♡┈┈∘ #CGM48\n#ChampooCGM48 ∘┈┈♡.°";
                    $data->message = $messageBody;
                    $response = CallApiController::callLineNotify($data);

                    $data = (object)[];
                    $data->message = "image : ". $file_name;
                    $data->imageThumbnail = $jsonResponse->content->thumbImageUrl;
                    $data->imageFullsize = $jsonResponse->content->thumbImageUrl;
                    $response = CallApiController::callLineNotify($data);
                } elseif ($jsonResponse && isset($jsonResponse->schedule) && $jsonResponse->schedule->thumbImageUrl) {
                    $data = (object)[];
                    $data->message = "Live image : ". $file_name;
                    $data->imageThumbnail = $jsonResponse->schedule->thumbImageUrl;
                    $data->imageFullsize = $jsonResponse->schedule->thumbImageUrl;
                    $response = CallApiController::callLineNotify($data);
                }
            }
        } catch (\Throwable $th) {
            $res->success = 0;
            $res->message = 'Error Line : '.$th->getLine().' Something went wrong'.$th->getMessage();
        }
        return response()->json($res);
    }

    public static function replacePostMemberName($text) {
        if (strpos($text, '@**PUN|1**') !== false) {
            $text = str_replace('@**PUN|1**', ' #PunBNK48 ', $text);
        }
        if (strpos($text, '@**JENNIS|2**') !== false) {
            $text = str_replace('@**JENNIS|2**', ' #JennisBNK48 ', $text);
        }
        if (strpos($text, '@**ORN|3**') !== false) {
            $text = str_replace('@**ORN|3**', ' #OrnBNK48 ', $text);
        }
        if (strpos($text, '@**CHERPRANG|4**') !== false) {
            $text = str_replace('@**CHERPRANG|4**', ' #CherprangBNK48 ', $text);
        }
        if (strpos($text, '@**TARWAAN|5**') !== false) {
            $text = str_replace('@**TARWAAN|5**', ' #TarwaanBNK48 ', $text);
        }
        if (strpos($text, '@**SATCHAN|6**') !== false) {
            $text = str_replace('@**SATCHAN|6**', ' #SatchanBNK48 ', $text);
        }
        if (strpos($text, '@**PUPE|7**') !== false) {
            $text = str_replace('@**PUPE|7**', ' #PupeBNK48 ', $text);
        }
        if (strpos($text, '@**PIAM|8**') !== false) {
            $text = str_replace('@**PIAM|8**', ' #PiamBNK48 ', $text);
        }
        if (strpos($text, '@**NOEY|9**') !== false) {
            $text = str_replace('@**NOEY|9**', ' #NoeyBNK48 ', $text);
        }
        if (strpos($text, '@**NINK|10**') !== false) {
            $text = str_replace('@**NINK|10**', ' #NinkBNK48 ', $text);
        }
        if (strpos($text, '@**NAMSAI|11**') !== false) {
            $text = str_replace('@**NAMSAI|11**', ' #NamsaiBNK48 ', $text);
        }
        if (strpos($text, '@**NAMNEUNG|12**') !== false) {
            $text = str_replace('@**NAMNEUNG|12**', ' #NamneungBNK48 ', $text);
        }
        if (strpos($text, '@**MUSIC|13**') !== false) {
            $text = str_replace('@**MUSIC|13**', ' #MusicBNK48 ', $text);
        }
        if (strpos($text, '@**MOBILE|14**') !== false) {
            $text = str_replace('@**MOBILE|14**', ' #MobileBNK48 ', $text);
        }
        if (strpos($text, '@**MIORI|15**') !== false) {
            $text = str_replace('@**MIORI|15**', ' #MioriBNK48 ', $text);
        }
        if (strpos($text, '@**MIND|16**') !== false) {
            $text = str_replace('@**MIND|16**', ' #MindBNK48 ', $text);
        }
        if (strpos($text, '@**KORN|18**') !== false) {
            $text = str_replace('@**KORN|18**', ' #KornBNK48 ', $text);
        }
        if (strpos($text, '@**KATE|19**') !== false) {
            $text = str_replace('@**KATE|19**', ' #KateBNK48 ', $text);
        }
        if (strpos($text, '@**KAIMOOK|20**') !== false) {
            $text = str_replace('@**KAIMOOK|20**', ' #KaimookBNK48 ', $text);
        }
        if (strpos($text, '@**KAEW|21**') !== false) {
            $text = str_replace('@**KAEW|21**', ' #KaewBNK48 ', $text);
        }
        if (strpos($text, '@**JIB|22**') !== false) {
            $text = str_replace('@**JIB|22**', ' #JibBNK48 ', $text);
        }
        if (strpos($text, '@**JAA|23**') !== false) {
            $text = str_replace('@**JAA|23**', ' #JaaBNK48 ', $text);
        }
        if (strpos($text, '@**JANE|24**') !== false) {
            $text = str_replace('@**JANE|24**', ' #JaneBNK48 ', $text);
        }
        if (strpos($text, '@**IZURINA|25**') !== false) {
            $text = str_replace('@**IZURINA|25**', ' #IzurinaCGM48 ', $text);
        }
        if (strpos($text, '@**WEE|26**') !== false) {
            $text = str_replace('@**WEE|26**', ' #WeeBNK48 ', $text);
        }
        if (strpos($text, '@**VIEW|27**') !== false) {
            $text = str_replace('@**VIEW|27**', ' #ViewBNK48 ', $text);
        }
        if (strpos($text, '@**STANG|28**') !== false) {
            $text = str_replace('@**STANG|28**', ' #StangBNK48 ', $text);
        }
        if (strpos($text, '@**RATAH|29**') !== false) {
            $text = str_replace('@**RATAH|29**', ' #RatahBNK48 ', $text);
        }
        if (strpos($text, '@**PHUKKHOM|30**') !== false) {
            $text = str_replace('@**PHUKKHOM|30**', ' #PhukkhomBNK48 ', $text);
        }
        if (strpos($text, '@**PANDA|31**') !== false) {
            $text = str_replace('@**PANDA|31**', ' #PandaBNK48 ', $text);
        }
        if (strpos($text, '@**PAKWAN|32**') !== false) {
            $text = str_replace('@**PAKWAN|32**', '#PakwanBNK48', $text);
        }
        if (strpos($text, '@**OOM|33**') !== false) {
            $text = str_replace('@**OOM|33**', ' #OomBNK48 ', $text);
        }
        if (strpos($text, '@**NINE|34**') !== false) {
            $text = str_replace('@**NINE|34**', ' #NineBNK48 ', $text);
        }
        if (strpos($text, '@**NIKY|35**') !== false) {
            $text = str_replace('@**NIKY|35**', ' #NikyBNK48 ', $text);
        }
        if (strpos($text, '@**NEW|36**') !== false) {
            $text = str_replace('@**NEW|36**', ' #NewBNK48 ', $text);
        }
        if (strpos($text, '@**NATHERINE|37**') !== false) {
            $text = str_replace('@**NATHERINE|37**', ' #NatherineBNK48 ', $text);
        }
        if (strpos($text, '@**MYYU|38**') !== false) {
            $text = str_replace('@**MYYU|38**', ' #MyyuBNK48 ', $text);
        }
        if (strpos($text, '@**MINMIN|39**') !== false) {
            $text = str_replace('@**MINMIN|39**', ' #MinminBNK48 ', $text);
        }
        if (strpos($text, '@**MEWNICH|40**') !== false) {
            $text = str_replace('@**MEWNICH|40**', ' #MewnichBNK48 ', $text);
        }
        if (strpos($text, '@**MAIRA|41**') !== false) {
            $text = str_replace('@**MAIRA|41**', ' #MairaBNK48 ', $text);
        }
        if (strpos($text, '@**KHENG|42**') !== false) {
            $text = str_replace('@**KHENG|42**', ' #KhengBNK48 ', $text);
        }
        if (strpos($text, '@**KHAMIN|43**') !== false) {
            $text = str_replace('@**KHAMIN|43**', ' #KhaminBNK48 ', $text);
        }
        if (strpos($text, '@**JUNÉ|44**') !== false) {
            $text = str_replace('@**JUNÉ|44**', ' #JunéBNK48 ', $text);
        }
        if (strpos($text, '@**GYGEE|45**') !== false) {
            $text = str_replace('@**GYGEE|45**', ' #GygeeBNK48 ', $text);
        }
        if (strpos($text, '@**FOND|46**') !== false) {
            $text = str_replace('@**FOND|46**', ' #FondBNK48 ', $text);
        }
        if (strpos($text, '@**FIFA|47**') !== false) {
            $text = str_replace('@**FIFA|47**', ' #FifaBNK48 ', $text);
        }
        if (strpos($text, '@**FAII|48**') !== false) {
            $text = str_replace('@**FAII|48**', ' #FaiiBNK48 ', $text);
        }
        if (strpos($text, '@**DEENEE|49**') !== false) {
            $text = str_replace('@**DEENEE|49**', ' #DeeneeBNK48 ', $text);
        }
        if (strpos($text, '@**CAKE|50**') !== false) {
            $text = str_replace('@**CAKE|50**', ' #CakeBNK48 ', $text);
        }
        if (strpos($text, '@**BAMBOO|51**') !== false) {
            $text = str_replace('@**BAMBOO|51**', ' #BambooBNK48 ', $text);
        }
        if (strpos($text, '@**AOM|52**') !== false) {
            $text = str_replace('@**AOM|52**', ' #AomCGM48 ', $text);
        }
        if (strpos($text, '@**MEEN|53**') !== false) {
            $text = str_replace('@**MEEN|53**', ' #MeenCGM48 ', $text);
        }
        if (strpos($text, '@**JJAE|54**') !== false) {
            $text = str_replace('@**JJAE|54**', ' #JjaeCGM48 ', $text);
        }
        if (strpos($text, '@**PEPO|55**') !== false) {
            $text = str_replace('@**PEPO|55**', ' #PepoCGM48 ', $text);
        }
        if (strpos($text, '@**FAHSAI|56**') !== false) {
            $text = str_replace('@**FAHSAI|56**', ' #FahsaiCGM48 ', $text);
        }
        if (strpos($text, '@**KAIWAN|57**') !== false) {
            $text = str_replace('@**KAIWAN|57**', ' #KaiwanCGM48 ', $text);
        }
        if (strpos($text, '@**MEI|58**') !== false) {
            $text = str_replace('@**MEI|58**', ' #MeiCGM48 ', $text);
        }
        if (strpos($text, '@**LATIN|59**') !== false) {
            $text = str_replace('@**LATIN|59**', ' #LatinCGM48 ', $text);
        }
        if (strpos($text, '@**PUNCH|60**') !== false) {
            $text = str_replace('@**PUNCH|60**', ' #PunchCGM48 ', $text);
        }
        if (strpos($text, '@**KYLA|61**') !== false) {
            $text = str_replace('@**KYLA|61**', ' #KylaCGM48 ', $text);
        }
        if (strpos($text, '@**MILK|62**') !== false) {
            $text = str_replace('@**MILK|62**', ' #MilkCGM48 ', $text);
        }
        if (strpos($text, '@**JAYDA|63**') !== false) {
            $text = str_replace('@**JAYDA|63**', ' #JaydaCGM48 ', $text);
        }
        if (strpos($text, '@**NICHA|64**') !== false) {
            $text = str_replace('@**NICHA|64**', ' #NichaCGM48 ', $text);
        }
        if (strpos($text, '@**PIM|65**') !== false) {
            $text = str_replace('@**PIM|65**', ' #PimCGM48 ', $text);
        }
        if (strpos($text, '@**NENA|66**') !== false) {
            $text = str_replace('@**NENA|66**', ' #NenaCGM48 ', $text);
        }
        if (strpos($text, '@**NENIE|67**') !== false) {
            $text = str_replace('@**NENIE|67**', ' #NenieCGM48 ', $text);
        }
        if (strpos($text, '@**PARIMA|68**') !== false) {
            $text = str_replace('@**PARIMA|68**', ' #ParimaCGM48 ', $text);
        }
        if (strpos($text, '@**ANGEL|69**') !== false) {
            $text = str_replace('@**ANGEL|69**', ' #AngelCGM48 ', $text);
        }
        if (strpos($text, '@**FORTUNE|70**') !== false) {
            $text = str_replace('@**FORTUNE|70**', ' #FortuneCGM48 ', $text);
        }
        if (strpos($text, '@**KANING|71**') !== false) {
            $text = str_replace('@**KANING|71**', ' #KaningCGM48 ', $text);
        }
        if (strpos($text, '@**PING|72**') !== false) {
            $text = str_replace('@**PING|72**', ' #PingCGM48 ', $text);
        }
        if (strpos($text, '@**SITA|73**') !== false) {
            $text = str_replace('@**SITA|73**', ' #SitaCGM48 ', $text);
        }
        if (strpos($text, '@**CHAMPOO|74**') !== false) {
            $text = str_replace('@**CHAMPOO|74**', ' #ChampooCGM48 ', $text);
        }
        if (strpos($text, '@**MARMINK|75**') !== false) {
            $text = str_replace('@**MARMINK|75**', ' #MarminkCGM48 ', $text);
        }
        if (strpos($text, '@**ADMIN|77**') !== false) {
            $text = str_replace('@**ADMIN|77**', ' #Admin ', $text);
        }
        if (strpos($text, '@**EARN|78**') !== false) {
            $text = str_replace('@**EARN|78**', ' #EarnBNK48 ', $text);
        }
        if (strpos($text, '@**EARTH|79**') !== false) {
            $text = str_replace('@**EARTH|79**', ' #EarthBNK48 ', $text);
        }
        if (strpos($text, '@**EVE|80**') !== false) {
            $text = str_replace('@**EVE|80**', ' #EveBNK48 ', $text);
        }
        if (strpos($text, '@**FAME|81**') !== false) {
            $text = str_replace('@**FAME|81**', ' #FameBNK48 ', $text);
        }
        if (strpos($text, '@**GRACE|82**') !== false) {
            $text = str_replace('@**GRACE|82**', ' #GraceBNK48 ', $text);
        }
        if (strpos($text, '@**HOOP|83**') !== false) {
            $text = str_replace('@**HOOP|83**', ' #HoopBNK48 ', $text);
        }
        if (strpos($text, '@**JAOKHEM|84**') !== false) {
            $text = str_replace('@**JAOKHEM|84**', ' #JaokhemBNK48 ', $text);
        }
        if (strpos($text, '@**JEJE|85**') !== false) {
            $text = str_replace('@**JEJE|85**', ' #JejeBNK48 ', $text);
        }
        if (strpos($text, '@**KAOFRANG|86**') !== false) {
            $text = str_replace('@**KAOFRANG|86**', ' #KaofrangBNK48 ', $text);
        }
        if (strpos($text, '@**MEAN|87**') !== false) {
            $text = str_replace('@**MEAN|87**', ' #MeanBNK48 ', $text);
        }
        if (strpos($text, '@**MONET|88**') !== false) {
            $text = str_replace('@**MONET|88**', ' #MonetBNK48 ', $text);
        }
        if (strpos($text, '@**PAEYAH|89**') !== false) {
            $text = str_replace('@**PAEYAH|89**', ' #PaeyahBNK48 ', $text);
        }
        if (strpos($text, '@**PAMPAM|90**') !== false) {
            $text = str_replace('@**PAMPAM|90**', ' #PampamBNK48 ', $text);
        }
        if (strpos($text, '@**PANCAKE|91**') !== false) {
            $text = str_replace('@**PANCAKE|91**', ' #PancakeBNK48 ', $text);
        }
        if (strpos($text, '@**PEAK|92**') !== false) {
            $text = str_replace('@**PEAK|92**', ' #PeakBNK48 ', $text);
        }
        if (strpos($text, '@**PIM|93**') !== false) {
            $text = str_replace('@**PIM|93**', ' #PimBNK48 ', $text);
        }
        if (strpos($text, '@**POPPER|94**') !== false) {
            $text = str_replace('@**POPPER|94**', ' #PopperBNK48 ', $text);
        }
        if (strpos($text, '@**YAYEE|95**') !== false) {
            $text = str_replace('@**YAYEE|95**', ' #YayeeBNK48 ', $text);
        }
        if (strpos($text, '@**YOGHURT|96**') !== false) {
            $text = str_replace('@**YOGHURT|96**', ' #YoghurtBNK48 ', $text);
        }
        if (strpos($text, '@**HERO|97**') !== false) {
            $text = str_replace('@**HERO|97**', ' #HeroCGM48 ', $text);
        }
        if (strpos($text, '@**KANAME|98**') !== false) {
            $text = str_replace('@**KANAME|98**', ' #KanameCGM48 ', $text);
        }
        if (strpos($text, '@**KIRAKIRA|99**') !== false) {
            $text = str_replace('@**KIRAKIRA|99**', ' #KirakiraCGM48 ', $text);
        }
        if (strpos($text, '@**BLUECIFER|100**') !== false) {
            $text = str_replace('@**BLUECIFER|100**', ' #BlueciferCGM48 ', $text);
        }
        if (strpos($text, '@**HOMNUAN|101**') !== false) {
            $text = str_replace('@**HOMNUAN|101**', ' #HomnuanCGM48 ', $text);
        }
        if (strpos($text, '@**PRINCESS|102**') !== false) {
            $text = str_replace('@**PRINCESS|102**', ' #PrincessCGM48 ', $text);
        }
        if (strpos($text, '@**WAWA|103**') !== false) {
            $text = str_replace('@**WAWA|103**', ' #WawaBNK48 ', $text);
        }
        if (strpos($text, '@**SINDY|104**') !== false) {
            $text = str_replace('@**SINDY|104**', ' #SindyBNK48 ', $text);
        }
        if (strpos($text, '@**PATT|105**') !== false) {
            $text = str_replace('@**PATT|105**', ' #PattBNK48 ', $text);
        }
        if (strpos($text, '@**JANRY|106**') !== false) {
            $text = str_replace('@**JANRY|106**', ' #JanryBNK48 ', $text);
        }
        if (strpos($text, '@**EMMY|107**') !== false) {
            $text = str_replace('@**EMMY|107**', ' #EmmyBNK48 ', $text);
        }
        if (strpos($text, '@**MICHA|108**') !== false) {
            $text = str_replace('@**MICHA|108**', ' #MichaBNK48 ', $text);
        }
        if (strpos($text, '@**MARINE|109**') !== false) {
            $text = str_replace('@**MARINE|109**', ' #MarineBNK48 ', $text);
        }
        if (strpos($text, '@**BERRY|110**') !== false) {
            $text = str_replace('@**BERRY|110**', ' #BerryBNK48 ', $text);
        }
        if (strpos($text, '@**PALMMY|111**') !== false) {
            $text = str_replace('@**PALMMY|111**', ' #PalmmyBNK48 ', $text);
        }
        if (strpos($text, '@**L|112**') !== false) {
            $text = str_replace('@**L|112**', ' #LBNK48 ', $text);
        }
        if (strpos($text, '@**NENE|113**') !== false) {
            $text = str_replace('@**NENE|113**', ' #NeneBNK48 ', $text);
        }
        if (strpos($text, '@**PAPANG|114**') !== false) {
            $text = str_replace('@**PAPANG|114**', ' #PapangCGM48 ', $text);
        }
        if (strpos($text, '@**GINNA|115**') !== false) {
            $text = str_replace('@**GINNA|115**', ' #GinnaCGM48 ', $text);
        }
        if (strpos($text, '@**TWOBAM|116**') !== false) {
            $text = str_replace('@**TWOBAM|116**', ' #TwobamCGM48 ', $text);
        }
        if (strpos($text, '@**EMMA|117**') !== false) {
            $text = str_replace('@**EMMA|117**', ' #EmmaCGM48 ', $text);
        }
        if (strpos($text, '@**NANA|118**') !== false) {
            $text = str_replace('@**NANA|118**', ' #NanaCGM48 ', $text);
        }
        if (strpos($text, '@**JINGJING|119**') !== false) {
            $text = str_replace('@**JINGJING|119**', ' #JingjingCGM48 ', $text);
        }
        if (strpos($text, '@**LOOKKED|120**') !== false) {
            $text = str_replace('@**LOOKKED|120**', ' #LookkedCGM48 ', $text);
        }
        if (strpos($text, '@**BNK48SHIHAININ|121**') !== false) {
            $text = str_replace('@**BNK48SHIHAININ|121**', ' #ShihaininBNK48 ', $text);
        }
        if (strpos($text, '@**ARLEE|122**') !== false) {
            $text = str_replace('@**ARLEE|122**', ' #ArleeBNK48 ', $text);
        }
        if (strpos($text, '@**GALEYA|123**') !== false) {
            $text = str_replace('@**GALEYA|123**', ' #GaleyaBNK48 ', $text);
        }
        if (strpos($text, '@**JEW|124**') !== false) {
            $text = str_replace('@**JEW|124**', ' #JewBNK48 ', $text);
        }
        if (strpos($text, '@**KHAIMOOK|125**') !== false) {
            $text = str_replace('@**KHAIMOOK|125**', ' #KhaimookBNK48 ', $text);
        }
        if (strpos($text, '@**MAYJI|126**') !== false) {
            $text = str_replace('@**MAYJI|126**', ' #MayjiBNK48 ', $text);
        }
        if (strpos($text, '@**NALL|127**') !== false) {
            $text = str_replace('@**NALL|127**', ' #NallBNK48 ', $text);
        }
        if (strpos($text, '@**NAMMONN|128**') !== false) {
            $text = str_replace('@**NAMMONN|128**', ' #NammonnBNK48 ', $text);
        }
        if (strpos($text, '@**NANABNK48|129**') !== false) {
            $text = str_replace('@**NANABNK48|129**', ' #Nanabnk48BNK48 ', $text);
        }
        if (strpos($text, '@**NEEN|130**') !== false) {
            $text = str_replace('@**NEEN|130**', ' #NeenBNK48 ', $text);
        }
        if (strpos($text, '@**NIYA|131**') !== false) {
            $text = str_replace('@**NIYA|131**', ' #NiyaBNK48 ', $text);
        }
        if (strpos($text, '@**PROUD|132**') !== false) {
            $text = str_replace('@**PROUD|132**', ' #ProudBNK48 ', $text);
        }
        if (strpos($text, '@**SAONOI|133**') !== false) {
            $text = str_replace('@**SAONOI|133**', ' #SaonoiBNK48 ', $text);
        }
        return $text;
    }
}
