@extends('layouts.client')
@section('assets')
@endsection
@section('content')
<form action="/feedbacks" class="form-horizontal prevent_submit" enctype="multipart/form-data" method="post">
{!! csrf_field() !!}
<br>
<div class="container">
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
            </div>
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-lg-12">
                <!-- general form elements -->
                <div class="card card-light">
                    <div class="card-header">
                        <b>Feedback</b>
                        <div class="float-right">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="feedback_name">Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="feedback_name" name="feedback_name" value="">
                                @if ($errors->has('feedback_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('feedback_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-2 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="desc">แนะนำ/ติชม *</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="feedback_message" name="feedback_message"
                                    row="5">{{ (old('feedback_message') ? old('feedback_message') : "") }}</textarea>
                                @if ($errors->has('feedback_message'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('feedback_message') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-2 col-xs-12">
                            </div>
                        </div>
                    </div> <!-- /.card body-->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-lg-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="text-center col-sm-12" style="padding-top:10px;">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--card-body3-->
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('scripts')
@endsection
