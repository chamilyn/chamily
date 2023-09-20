@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_kongtun.css?v={{ time() }}">
@endsection
@section('content')
<div class="container mt-4 mb-4 d-flex justify-content-center">
    <div class="card bdcard" style="width: 90%;">
        <div class="card-body">
            <div class="text-center">
                <h3>
                    <b><span style="color:#36b874;">เก็บหอมรอมริบ <br>With Chamily</span></b>
                    <i class="fa fa-rocket" style="color: #36b874;"></i>
                </h3>
            </div>
            <div style="text-align: -webkit-center;"><hr width="95%"></div>
            <h5><u><b>ออมเงินก่อน General Election</b></u></h5>
            <h6>&emsp;&emsp;- ออมเงินได้ไม่จำกัดจำนวนครั้ง และยอดต้องมากกว่าหรือเท่ากับ 100฿<br><font color="red">*หากมีการออมไม่ครบหรือขาดออมจะถูกนับเป็น 1 ครั้ง / 2 ครั้งจะถูกตักเตือน / 3 ครั้งจะขออนุญาตเชิญออกจากห้องออม (ในกรณีออมไม่ครบหรือขาดออมและมาชำระในเดือนถัดไป จะต้องชำระให้ถึงจำนวนขั้นต่ำของเดือนที่แล้ว)</font></h6>
            <h6>&emsp;&emsp;- มีการจัดตาราง Top Spender สำหรับผู้ที่ชำระมากที่สุดอยู่ใน 1-3 อันดับแรกจะได้รับ Goods ประจำเดือนนั้นทันที<br><font color="red">*ในกรณีที่ชำระ 100฿ ทุกคนจะไม่มีท๊อปสเปนเดอร์ หรือหากมากกว่า 100฿ เพียงคนเดียวก็จะได้คนเดียว</font></h6>
            <h6>&emsp;&emsp;- ในทุกเดือน Chamily จะทำการทบยอดที่ได้ในเดือนนั้นๆ 10%</h6>
            
            <br>
            <h5><u><b>ออมเงินช่วง General Election</b></u></h5>
            <h6>&emsp;&emsp;- ออมเงินทุกวันอาทิตย์ 1 ครั้ง/สัปดาห์</h6>
            <h6>&emsp;&emsp;- ออมเงินขั้นต่ำ 100฿</h6>
            <h6>&emsp;&emsp;- รางวัลสำหรับ Top Spender สูงที่สุดตั้งแต่การออมในช่วง General Election จนถึงวันปิดโหวต 1 รางวัล</h6>

            <br>
            <h5><u><b>ขั้นตอนการสมัครเข้าร่วมกองทุน</b></u></h5>
            <h6>&emsp;&emsp;- ติดต่อได้ที่ Chamily ทุกช่องทาง หรือ <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=045kiopw" target="_blank"><button type="button" class="btn btn-success">คลิกที่นี่</button></a></h6>
            <h6>&emsp;&emsp;- ค่าสมัครเข้าร่วมกองทุน 100฿</h6>
        </div>
    </div>
</div>
@endsection
