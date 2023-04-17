@extends('layouts.admin')
@section('assets')

@endsection
@section('content')
@if (isset($event))
<form action="/admin/event/{{$event->id}}" class="form-horizontal" enctype="multipart/form-data" method="post">
@method("PUT")
@else
<form action="/admin/event" class="form-horizontal prevent_submit" enctype="multipart/form-data" method="post">
@endif
{!! csrf_field() !!}
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-lg-12">
                <!-- general form elements -->
                <div class="card card-light">
                    <div class="card-header">
                        <b>Add Event</b>
                        <div class="float-right">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="event_name">Name</label>
                            <div class="col-sm-5">
                                <input type="hidden" class="form-control" readonly id="event_id"
                                        name="event_id" value="{{ (isset($event) ? $event->id:'') }}">
                                <input type="text" class="form-control" id="event_name" name="event_name"
                                        value="{{ (old('event_name') ? old('event_name') : (isset($event) ?$event->name:"")) }}">
                                @if ($errors->has('event_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('event_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-2 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="start_date">Start Date</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                        value="{{ (isset($event)?$event->start_date:'') }}">
                                @if ($errors->has('start_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-2 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="end_date">End Date</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                        value="{{ (isset($event)?$event->end_date:'') }}">
                            </div>
                            <div class="col-md-2 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="img_path">Image</label>
                            <div class="col-sm-5">
                                @if(isset($event) && $event->img_path)
                                <a href="/storage/events/{{$event->img_path}}" target="_blank">{{$event->img_path}}</a>
                                @endif
                                <input type="file" class="form-control" id="img_path" name="img_path">
                                @if ($errors->has('img_path'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('img_path') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="url">Link</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="url" name="url"
                                        value="{{ (old('url') ? old('url') : (isset($event) ?$event->url:"")) }}">
                            </div>
                            <div class="col-md-2 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="desc">Description</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="desc" name="desc"
                                    row="5">{{ (old('desc') ? old('desc') : (isset($event) ?$event->desc:"")) }}</textarea>
                                @if ($errors->has('desc'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('desc') }}</strong>
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
                            <div class="col-sm-2">
                            </div>
                            <div class="text-center col-sm-4" style="padding-top:10px;">
                                <button type="submit" class="btn btn-primary btn-block">
                                    @if(isset($event))
                                    Update
                                    @else
                                    Create
                                    @endif

                                </button>
                            </div>

                            <div class="text-center col-sm-4" style="padding-top:10px;">
                                <button type="button" class="btn btn-danger btn-block"
                                    onclick="window.location='/admin/event';">
                                    Cancel
                                </button>
                            </div>
                            <div class="col-sm-2">
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
<script src="/js/event_add.js"></script>
@endsection
