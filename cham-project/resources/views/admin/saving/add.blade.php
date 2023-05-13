@extends('layouts.admin')
@section('assets')

@endsection
@section('content')
@if (isset($saving))
<form action="/admin/savings/{{$saving->id}}" class="form-horizontal" enctype="multipart/form-data" method="post">
@method("PUT")
@else
<form action="/admin/savings" class="form-horizontal prevent_submit" enctype="multipart/form-data" method="post">
@endif
{!! csrf_field() !!}
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-lg-12">
                <!-- general form elements -->
                <div class="card card-light">
                    <div class="card-header">
                        <b>Add Saving</b>
                        <div class="float-right">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="saving_name">Name</label>
                            <div class="col-sm-5">
                                <input type="hidden" class="form-control" readonly id="saving_id"
                                        name="saving_id" value="{{ (isset($saving) ? $saving->id:'') }}">
                                <input type="text" class="form-control" id="saving_name" name="saving_name"
                                        value="{{ (old('saving_name') ? old('saving_name') : (isset($saving) ?$saving->name:"")) }}">
                                @if ($errors->has('saving_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('saving_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-2 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="note">Note</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="note" name="note"
                                    row="5">{{ (old('note') ? old('note') : (isset($saving) ?$saving->note:"")) }}</textarea>
                                @if ($errors->has('note'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('note') }}</strong>
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
                                    @if(isset($saving))
                                    Update
                                    @else
                                    Create
                                    @endif

                                </button>
                            </div>

                            <div class="text-center col-sm-4" style="padding-top:10px;">
                                <button type="button" class="btn btn-danger btn-block"
                                    onclick="window.location='/admin/savings';">
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
@endsection
