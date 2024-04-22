@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_card_congrat2.css?v={{ time() }}">
@endsection
@section('content')
@if(isset($propose_name))
<div class="container mt-4 mb-4 d-flex justify-content-center">
    <div style="text-align: center;">
        <b>
            <h1>New Fandom Name!</h1>
            <div style="text-align: -webkit-center;"><hr></div>                      
            <h4>✿ Chamily ✿</h4>
        </b>
    </div>

</div>
<div class="wrapper">
    <div class="card">
        <div style="text-align: center;">
            <b>
                <h4>ชื่อทั้งหมดเป็นการเสนอจากแฟนคลับของแชม ๆ  ฝากให้แชม ๆ ช่วยเลือกชื่อที่ชอบ แล้วพิมพ์ที่ด้านล่างสุดเลย สามารถเลือกได้มากกว่าหนึ่งชื่อหรือแชมๆจะเสนอชื่อเองก็ได้นะ</h4>
            </b>
        </div>
    </div>
    @foreach ($propose_name as $propose)
        <div class="card">
            <p><b>ชื่อ :</b> {{$propose->new_name}}</p>
            <p><b>ความหมาย :</b> {{$propose->desc}}</p>
        </div>
    @endforeach

    <form id="propose_name_form" action="/propose_name_for_champoo" class="form-horizontal prevent_submit" enctype="multipart/form-data" method="post">
    {!! csrf_field() !!}
        <div class="card">
            <div class="mb-3">
                <label for="text_url" class="form-label"><font color="#000">แชม ๆ กรอกแล้วกด บันทึก ได้เลย</font></label>
                <input type="text" class="form-control" id="change_name" name="change_name" autocomplete="off">
            </div>

            <div  style="text-align: -webkit-center;" class="mt-4">
                <button id="download" type="submit" class="btn btn-outline-success">บันทึก</button>
            </div>
        </div>
    </form>
</div>
@else
    ไม่พบแคมเปญ
@endif
@endsection
@section('scripts')
<script>
    $('#propose_name_form').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        if (
        confirm(`ยืนยันคำตอบ ?`)
        ) {
            $('#download').attr('disabled', true);
        
            this.submit();
        } else {
            return false;
        }
    });

</script>
@endsection