<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function showFlower($month)
    {
        $short_month = '';
        $background_color = '';
        $img_path = '';
        $img_color = '';
        $flower_text = '';
        $message = '';
        if ($month == 'january') {
            $background_color = '#efebd6';
            $short_month = 'JAN';
            $img_path = 'carnation.jpg';
            $img_color = '#FAF9F6';
            $flower_text = 'Carnation';
            $message = 'ดอกไม้ที่แสดงถึงความชื่นชมยินดี ความรักที่บริสุทธิ์ ไร้เดียงสาและอ่อนโยน คุณคือสิ่งมีค่าที่น่าทะนุถนอม ขอบคุณในทุกวันที่มีคุณอยู่';
        } else if ($month == 'february') {
            $background_color = '#bdeae0';
            $short_month = 'FEB';
            $img_path = 'daffodil.jpg';
            $img_color = '#69c17e';
            $flower_text = 'Daffodil';
            $message = 'มีคนเคยเปรียบเทียบไว้ว่าการได้โอบกอดช่อดอกแดฟโฟดิลไว้เต็มอ้อมแขนเสมือนได้โอบกอดแสงอาทิตย์ ซึ่งการมอบดอกไม้ชนิดนี้ยังหมายถึง การมอบความรักให้แก่คนที่รักโดยมิได้หวังแม้แต่สิ่งตอบแทน';
        } else if ($month == 'march') {
            $background_color = '#E3FAFF';
            $short_month = 'MAR';
            $img_path = 'daisy.jpg';
            $img_color = '#30D5C8';
            $flower_text = 'Daisy';
            $message = 'สัญลักษณ์ของความสวยงาม ความบริสุทธิ์ไร้เดียงสา ความอดทน ความหวังและการเริ่มต้นใหม่ สื่อถึงความพยายามที่หนักแน่น ไม่ว่าจะเจออุปสรรคใดๆก็จะไม่ย่อท้อและพร้อมก้าวผ่านไปพบเจอความสุขเสมอ';
        } else if ($month == 'april') {
            $background_color = '#e2cee2';
            $short_month = 'APR';
            $img_path = 'violet.jpg';
            $img_color = '#e5b161';
            $flower_text = 'Violet';
            $message = '"ความศรัทธา ความไว้เนื้อเชื่อใจ และความถ่อมตน" อีกนัยหนึ่งคือการบอกถึงเจตนาที่จะเปิดเผยความในใจของตัวเอง และเคารพตัวตนของผู้อื่นไปในเวลาเดียวกัน';
        } else if ($month == 'may') {
            $background_color = '#f8c6b7';
            $short_month = 'MAY';
            $img_path = 'rose.jpg';
            $img_color = '#ab89db';
            $flower_text = 'Rose';
            $message = '"Rose" มีรากศัพท์มาจากภาษากรีกที่อ่านว่า "Rhodon" โดยถือเป็นตัวแทนที่สื่อถึงความสุข ความสัมพันธ์อันดี เหมาะมอบให้กันเพื่อแสดงถึงความรัก ถือเป็นดอกไม้กามเทพที่จะนำโชคเรื่องความรักมามอบให้กับใครซักคนเพื่อเติมเต็มหัวใจ';
            
        } else if ($month == 'june') {
            $background_color = '#c5d5e2';
            $short_month = 'JUN';
            $img_path = 'Delphinium.jpg';
            $img_color = '#00A36C';
            $flower_text = 'Delphinium';
            $message = 'เป็นดอกไม้แห่งการมองโลกในแง่บวก ความใจกว้าง อารมณ์ดี สร้างสีสันให้กับคนรอบข้าง และให้ความสำคัญกับผู้อื่นมาเป็นอันดับแรกเสมอ';
        } else if ($month == 'july') {
            $background_color = '#FDD5DF';
            $short_month = 'JUL';
            $img_path = 'Aster.jpg';
            $img_color = '#60A3D9';
            $flower_text = 'Aster';
            $message = 'แทนความห่วงใย ความมุ่งมั่น ความน่าหลงใหลและมีเสน่ห์ คนจีนมักเชื่อว่าเป็นสิ่งที่แทนถึงความซื่อสัตย์และจงรักภักดี';
        } else if ($month == 'august') {
            $background_color = '#f4dbc2';
            $short_month = 'AUG';
            $img_path = 'lily.jpg';
            $img_color = '#e5b161';
            $flower_text = 'Lily';
            $message = 'แทนความนุ่มนวลอ่อนหวาน น่ารักสดใส ความจริงใจที่มอบให้และเทิดทูน เพื่อใช้แทนคำที่บอกว่า "ฉันรู้สึกดีที่ได้รู้จักและพบกับคุณ"';
        } else if ($month == 'september') {
            $background_color = '#fbc9c4';
            $short_month = 'SEP';
            $img_path = 'Chrysanthemum.jpg';
            $img_color = '#f77a6f';
            $flower_text = 'Chrysanthemum';
            $message = 'ดอกไม้แห่งพลังบวก ความรื่นเริงและความบริสุทธิ์ใจ เป็นสัญลักษณ์แห่งความซื่อสัตย์ มอบให้กับคุณเพื่อให้คุณสดใสเบ่งบาน และมีพลังสู้กับทุกสิ่งที่ต้องเผชิญ';
        } else if ($month == 'october') {
            $background_color = '#fefae2';
            $short_month = 'OCT';
            $img_path = 'sunflower.jpg';
            $img_color = '#100d00';
            $flower_text = 'Sunflower';
            $message = 'การมอบดอกทานตะวันหมายถึงการบอกผู้รับว่า ความรักที่มีให้จะมั่นคง ไม่เปลี่ยนแปลง เหมือนทานตะวันที่เฝ้ามองดวงอาทิตย์เสมอ และสื่อถึงการอวยพรให้ผู้รับมีแต่ความร่าเริงสดใสและมีแต่ความสุข';
        } else if ($month == 'november') {
            $background_color = '#ffdbe1';
            $short_month = 'NOV';
            $img_path = 'tulip.jpg';
            $img_color = '#5cccb8';
            $flower_text = 'Tulip';
            $message = 'เป็นตัวแทนของการตกหลุมรักอย่างหมดหัวใจ ความหลงใหล และการปกป้อง อยากให้ผู้รับรับรู้ถึงความอบอุ่น ความมีเสน่ห์ การให้เกียรติและความซื่อสัตย์';
        } else if ($month == 'december') {
            $background_color = '#fef1b1';
            $short_month = 'DEC';
            $img_path = 'dandilion.jpg';
            $img_color = '#826b00';
            $flower_text = 'Dandilion';
            $message = 'เป็นดอกไม้แห่งความสุข ความร่าเริงและความหวัง คนญี่ปุ่นเชื่อว่าถ้าเราอธิษฐานและเป่าเมล็ดของแดนดิไลออนทั้งหมดหลุดออกจากดอกได้ในครั้งเดียวจะทำให้สมหวังในสิ่งนั้น และพบเจอกับความสุข';
        }
        
        return view('flower.show',['short_month' => $short_month,'background_color' => $background_color,'message' => $message
        ,'img_path' => $img_path,'img_color' => $img_color,'flower_text' => $flower_text
        ]);
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
}
