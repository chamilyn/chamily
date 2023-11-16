
@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_record_iam48.css?v={{ time() }}">
@endsection
@section('content')
    
    <div class="container mt-4 mb-4 d-flex justify-content-center">
        <div class="row" style="width: 90%;">
            <div class="text-center">
                <h2 style="color: #26577C;"><b>Save From IAM48 💾</b></h2>
            </div>
            <div style="text-align: -webkit-center; color:#26577C;"><hr width="95%"></div>
            <div class="card" style="background-color: #EBE4D1; border: none;">
                <div class="card-body">
                    {!! csrf_field() !!}
                    <div class="mb-3">
                        <label for="text_url" class="form-label"><font color="#26577C">Link From IAM48</font></label>
                        <input type="text" class="form-control" id="text_url" name="text_url" value="" maxlength="100" autocomplete="off"> 
                    </div>

                    <div  style="text-align: -webkit-center;" class="mt-4">
                        <button id="download" type="button" class="btn btn-outline-success">Download</button>
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
                const url = $("#text_url").val();
                if (!url) {
                    alert("กรุณากรอก Link");
                    return false;
                }

                $.ajax({
                    url: `/record_iam_download`,
                    method: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        url: url
                    },
                    success: function (result) {
                    if (result.success == 1) {
                        const imageUrl = result.data[0]; // Replace with the actual image URL
                        const filename = 'downloaded_image.jpg'; // Replace with the desired file name
                        //downloadImage(imageUrl, filename);
                        window.location.href = imageUrl;
                    } else {
                        alert("No image found");
                    }
                    },
                });
            });
        });
    </script>
@endsection