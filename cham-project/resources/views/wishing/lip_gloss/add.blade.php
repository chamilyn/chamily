@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_card_congrat.css?v={{ time() }}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection
@section('content')
<div class="container mt-4 mb-4 d-flex justify-content-center">
    <div class="row" style="width: 90%;">
        <div class="text-center">
            <h2 style="color: #b68068;"><b>Congratulations!</b></h2>
        </div>
        <div style="text-align: -webkit-center; color:#b68068;"><hr width="95%"></div>
        <form action="/wishing" class="form-inline prevent_submit" enctype="multipart/form-data" method="post">
            {!! csrf_field() !!}
            <input type="hidden" id="wishing_id" name="wishing_id" value="" />
            <div class="mb-3">
                <label for="text_sign" class="form-label"><font color="#b68068">ร่วมแสดงความยินดี</font>&nbsp;<font color="red">(100 ตัวอักษร)</font></label>
                <textarea class="form-control" id="text_sign" name="text_sign" value="" maxlength="100" autocomplete="off" row="5"></textarea>
                <!-- แปลง input ให้เป็น textarea -->
            </div>

            <div  style="text-align: -webkit-center;" class="mt-4">
                <button type="button" id="send_btn" onclick="document.getElementById('modal01').style.display='block'" class="btn btn-success">ส่งข้อความ</button>
            </div>
        </form>
    </div>
</div>
<div id="modal01" class="w3-modal" onclick="this.style.display='none'" style="margin-top: 50px">
    <div class="w3-modal-content w3-animate-zoom"  style="width: 95% !important;text-align: center;background: none;">
        <img id="img01" src="/img_champoo/congrat_lip_gloss.jpg" alt="Description" style="width: 100%">
        <br>
        <p style="color: white;margin-top: 15px;font-size: 20px;">ปิด</p>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Get the modal
        var modal = $("#myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = $("#myImg");
        var modalImg = $("#img01");
        var captionText = $("#caption");

        $("#send_btn").on("click", function (evt) {
            modal.css("display", "block");
            modalImg.attr("src", this.src);
            captionText.html(this.alt);
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