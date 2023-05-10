@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_feedbacks.css?v={{ time() }}">
@endsection
@section('content')
<form action="/feedbacks" class="form-horizontal prevent_submit" enctype="multipart/form-data" method="post">
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
                        <b><span style="color:#3F5E98;">แนะนำพวกเรา</span></b>
                        <img src="img_champooart/champybara.png" width="70" height="70"></img>
                    </h3>
                </div>
                <div style="text-align: -webkit-center;"><hr width="95%"></div>
                <form>
                    <div class="mb-3">
                        <label for="feedback_name" class="form-label">ชื่อ</label><font color="red"> (*ใส่หรือไม่ก็ได้)</font>
                        <input type="text" class="form-control" id="feedback_name" name="feedback_name" value="">
                    </div>
                    <div class="mb-3">
                        <label for="feedback_message" class="form-label">สิ่งที่อยากบอกเรา</label>
                        <textarea class="form-control" id="feedback_message" name="feedback_message"
                            row="5">{{ (old('feedback_message') ? old('feedback_message') : (isset($feedback) ?$feedback->feedback_message:"")) }}</textarea>
                        @if ($errors->has('feedback_message'))
                        <span class="help-block">
                            <strong>{{ $errors->first('feedback_message') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div  style="text-align: -webkit-center;">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
@endsection
@section('scripts')
@endsection
