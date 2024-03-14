@extends('layouts.admin')
@section('assets')

@endsection
@section('content')
<div class="container mt-4 mb-4 d-flex justify-content-center">
        <div class="card" style="width: 90%;">
            <div class="card-body">
                <div class="text-center">
                    <h2 style="color: #d64219;"><b>ดาวน์โหลดปกไลฟ์จาก IAM48 💾</b></h2>
                </div>

                <div style="text-align: -webkit-center;"><hr width="95%"></div>

                <form action="#" method="POST" name="form1" id="form1" enctype="multipart/form-data" class="form-inline">
                    <div class="mb-3">
                        <label for="text_url" class="form-label"><font color="#000">ลิงค์ดาวน์โหลดปกไลฟ์</font></label>
                        <input type="text" class="form-control" id="text_url" name="text_url" value="" maxlength="100" autocomplete="off">
                    </div>

                    <div  style="text-align: -webkit-center;" class="mt-4">
                        <button id="download" type="button" class="btn btn-outline-success">Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function () {
            $("#download").on("click", function (evt) {
                $(this).attr("disabled", true);
                const url = $("#text_url").val();
                if (!url) {
                    alert("กรุณากรอก Link");
                    $(this).attr("disabled", false);
                    return false;
                }
                $.ajax({
                    url: `/admin/record_iam_download`,
                    method: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        url: url
                    },
                    success: function (result) {
                        if (result.success == 1) {
                            alert("Send api success!");
                        } else {
                            alert("No image found");
                        }
                        $("#download").attr("disabled", false);
                    },
                });
            });
        });
    </script>
@endsection