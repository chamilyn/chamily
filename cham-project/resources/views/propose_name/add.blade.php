@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_changename.css?v={{ time() }}">
@endsection
@section('content')
<form id="propose_name_form" action="/propose_name" class="form-horizontal prevent_submit" enctype="multipart/form-data" method="post">
{!! csrf_field() !!}
    @if (Session()->has('error'))
        <div class="alert alert-danger">
            {!! Session()->get('error') !!}
        </div>
        @if (Session()->has('message'))
            <div class="alert alert-danger">
                <ul class="mb-0 ml-2">
                    @foreach (Session()->get('message') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endif
    @if (Session()->has('success'))
        <div class="alert alert-success">
            {{ Session()->get('success') }}
        </div>
    @endif
    <div class="container mt-4 mb-4 d-flex justify-content-center">
        <div class="card" style="width: 90%;">
            <div class="card-body">
                <div class="text-center">
                    <h3>
                        <b><span style="color:#f9c85f;">✿ ปิดกิจกรรมเสนอชื่อแฟนคลับของแชมพู ✿</span></b>
                    </h3>
                </div>

            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">เงื่อนไขและรายละเอียด</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>1.เชิญชวนแฟนคลับของแชมพูร่วมกันเสนอชื่อกลุ่มแฟนคลับของแชมพู โดยขอให้เกี่ยวข้องกับแชมพูและสามารถใช้ได้ทุกช่วงวัยพร้อมทั้งบอกความหมายของชื่อ</p>
                    <p>2.เมื่อปิดการเสนอชื่อแล้ว Chamily จะนำชื่อที่แฟนคลับเสนอมาทำการคัดกรองก่อนบางส่วน</p>
                    <p>3.เมื่อผ่านการคัดกรองชื่อกลุ่มแฟนคลับแล้ว ทาง Chamily จะนำชื่อที่ผ่านการคัดกรองทั้งหมด ไปเสนอให้แชมพูเป็นผู้เลือกอีกครั้งหนึ่ง (กำหนดการเลือก : ในงานจับมือซิง 16 ที่กำลังจะถึงนี้)</p>
                    <p>4.เมื่อได้ชื่อตามที่ต้องการแล้ว ถ้าในกรณีที่แชมพูชอบมากกว่าหนึ่งชื่อ Chamily จะนำชื่อที่แชมพูชอบมาเปิดโหวตอีกครั้งใน LINE Openchat โดยชื่อที่ได้รับผลโหวตมากที่สุดจะถูกนำมาใช้เป็นชื่อกลุ่มแฟนคลับของแชมพูต่อไป</p>
                    <br><p style="color: red;">หมายเหตุ : ผู้ที่ได้รับการเลือกชื่อกลุ่มแฟนคลับของแชมพูในกิจกรรมนี้ จะได้รับรางวัลสุดพิเศษจากทาง Chamily</p>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('scripts')
<script>
    
</script>
@endsection