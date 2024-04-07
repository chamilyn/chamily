@extends('layouts.admin')
@section('assets')

@endsection
@section('content')
<div class="container mt-4 mb-4 d-flex justify-content-center">
        <div class="card" style="width: 90%;">
            <div class="card-body">
                <div class="text-center">
                    <h2 style="color: #d64219;"><b>ดาวน์โหลด VDO IAM48 💾</b></h2>
                </div>

                <div style="text-align: -webkit-center;"><hr width="95%"></div>
                @if (!$is_error)
                <div  style="text-align: -webkit-center;" class="mt-4">
                    <a id="download" href="data:video/mp4;base64,{{$base64Video}}" download="{{$name}}" type="button" class="btn btn-outline-success">Download</a>
                </div>
                @else
                    No VDO File 
                @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function () {
            $("#download").on("click", function (evt) {
                // Display a confirmation dialog
                var result = confirm("Confirm download the video?");
                if (!result) {
                    // If user clicks "Cancel" in the confirmation dialog, prevent the default download behavior
                    evt.preventDefault();
                } else {
                    // If user clicks "OK" in the confirmation dialog, disable the download link
                    $(this).prop('disabled', true);
                }
            });
        });
    </script>
@endsection