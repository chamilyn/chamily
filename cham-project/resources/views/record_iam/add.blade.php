
@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_record_iam48.css?v={{ time() }}">
    <style>
        .template {
            display: none;
        }
    </style>
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

    <div style="display: none;" class="container mt-4 mb-4 justify-content-center download_zone">
        <div class="card" style="width: 90%;">
            <div class="card-body download_main_class" style="text-align: -webkit-center;">
                <div class="text-center">
                    <h2 style="color: #d64219;">รายการดาวน์โหลด 📸</h2>
                    <div style="text-align: -webkit-center;"><hr width="95%"></div>
                </div>
            
                <div class="card template" style="width: 18rem;">
                    <img src="" class="card-img-top show_image">
                    <div class="card-body">
                        <button type="button" file_name="" class="btn btn-outline-success button_download">ดาวน์โหลด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function init() {

        }
        function downloadImage(url, filename) {
            fetch(url)
                .then(response => response.blob())
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                })
                .catch(error => console.error('Error:', error));
        }
        jQuery(document).ready(function () {
            init();
            $("#download").on("click", function (evt) {
                $(this).attr("disabled", true);
                const url = $("#text_url").val();
                if (!url) {
                    alert("กรุณากรอก Link");
                    $(this).attr("disabled", false);
                    return false;
                }
                $(".download_main_class .card:not(.template)").remove();
                $(".download_main_class br").remove();
                $.ajax({
                    url: `/record_iam_download`,
                    method: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        url: url
                    },
                    success: function (result) {
                        if (result.success == 1) {
                            for (let data of result.data) {
                                const filename = 'downloaded_image.jpg';
                                //window.location.href = imageUrl;
                                $(".download_zone").css("display", "flex");
                                $clone = $(".template").clone();
                                $clone.find(".show_image").attr("src", data.image);
                                $clone.find(".button_download").attr("file_name", data.file_name);
                                $clone.removeClass("template");
                                $(".download_main_class").append($clone);
                                $(".download_main_class").append("<br>");
                            }
                            

                        } else {
                            alert("No image found");
                        }
                        $("#download").attr("disabled", false);
                    },
                });
            });

            $(".download_zone").on("click", ".button_download", function(){
                $(this).attr("disabled", true);
                // Get the src attribute of the show_image
                var imageUrl = $(this).closest(".card").find(".show_image").attr("src");
                var link = document.createElement('a');
                link.href = imageUrl;
                link.download = $(this).closest(".card").find(".button_download").attr("file_name");
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                $(this).attr("disabled", false);
            });
        });
    </script>
@endsection