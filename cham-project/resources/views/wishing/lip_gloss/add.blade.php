@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_card_congrat.css?v={{ time() }}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection
@section('content')
<div class="container mt-4 mb-4 d-flex justify-content-center">
    @if(isset($wishing_id) && $wishing_id)
    <div class="row" style="width: 90%;">
        <div class="text-center">
            <h2 style="color: #b68068;"><b>Congratulations!</b></h2>
        </div>
        <div style="text-align: -webkit-center; color:#b68068;"><hr width="95%"></div>
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" id="wishing_id" name="wishing_id" value="{{(isset($wishing_id) ? $wishing_id : null)}}" />
            <div class="mb-3">
                <label for="text_wish" class="form-label"><font color="#b68068">ร่วมแสดงความยินดี</font>&nbsp;<font color="red">(100 ตัวอักษร)</font></label>
                <textarea class="form-control" id="text_wish" name="text_wish" maxlength="100" autocomplete="off" row="5"></textarea>
                <!-- แปลง input ให้เป็น textarea -->
            </div>

            <div  style="text-align: -webkit-center;" class="mt-4">
                <button type="button" id="send_btn" class="btn btn-success">ส่งข้อความ</button>
            </div>
    </div>
    @else
        ไม่พบแคมเปญ
    @endif
</div>
<div id="modal01" class="w3-modal" onclick="this.style.display='none'" style="margin-top: 50px">
    <div class="w3-modal-content w3-animate-zoom"  style="width: 95% !important;text-align: center;background: none;">
        <img id="img01" src="/img_champoo/congrat_lip_gloss.jpg" alt="Description" style="width: 100%">
        <br>
        <p style="color: white;margin-top: 15px;font-size: 18px;">ปิด</p>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $("#send_btn").on("click", function (evt) {
            
            var modal = $("#modal01");
            var text_wish = $("#text_wish").val().trim();
            var wishing_id = $("#wishing_id").val();
            if (!text_wish) {
                alert('กรุณากรอกข้อความ');
                return false;
            }
            if (confirm(`ยืนยันบันทึกข้อมูล?`)) {
                $.ajax({
                    url: "/writing_save_lineitem",
                    method: "POST",
                    data: {
                        _token: $('#token').val(),
                        wish: text_wish,
                        wishing_id: wishing_id
                    },
                    success: function (results) {
                        //
                    },
                });
                modal.css("display", "block");
                $("#text_wish").val(null);
            }
        });

        // Get the <span> element that closes the modal
        var span = $(".close");

        // When the user clicks on <span> (x), close the modal
        span.click(function() {
            modal.css("display", "none");
        });
    });
</script>
@endsection