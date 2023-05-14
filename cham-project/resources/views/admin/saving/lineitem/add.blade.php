@extends('layouts.admin')
@section('assets')

@endsection
@section('content')
@if (isset($saving_lineitem))
<form action="/admin/savings/{{$saving->id}}/lineitem/{{$saving_lineitem->id}}" class="form-horizontal" enctype="multipart/form-data" method="post">
@method("PUT")
@else
<form action="/admin/savings/{{$saving->id}}/lineitem" class="form-horizontal prevent_submit" enctype="multipart/form-data" method="post">
@endif
{!! csrf_field() !!}
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-lg-12">
                <!-- general form elements -->
                <div class="card card-light">
                    <div class="card-header">
                        <b>{{$saving->name}}</b>
                        <div class="float-right">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="transfer_selected">Name</label>
                            <div class="col-sm-5">
                                <input type="hidden" class="form-control" readonly id="saving_id"
                                        name="saving_id" value="{{ (isset($saving) ? $saving->id:'') }}">
                                <input type="hidden" class="form-control" readonly id="saving_lineitem_id"
                                        name="saving_lineitem_id" value="{{ (isset($saving_lineitem_id) ? $saving_lineitem_id->id:'') }}">
                                <select id="transfer_selected" class="form-control transfer_selected"
                                    name="transfer_selected">
                                    <option value="">--- Select Transfer Name ---</option>
                                    @if(isset($transfers))
                                        @foreach($transfers as $transfer)
                                            <option value="{{$transfer->id}}"
                                            {{(isset($saving_lineitem) && $saving_lineitem->transfer_id == $transfer->id ? 'selected' : '')}}>[{{$transfer->saving_code}}] - {{$transfer->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('transfer_selected'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('transfer_selected') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-2 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="amount">Amount</label>
                            <div class="col-sm-5">
                                <input type="number" step="0.01" class="text-right form-control amount" name="amount"
                                value="{{(isset($saving_lineitem) && $saving_lineitem->amount ? number_format($saving_lineitem->amount,2) : null )}}">
                                @if ($errors->has('amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-2 col-xs-12">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="transfer_date">Date</label>
                            <div class="col-sm-5">
                                <input type="datetime-local" class="form-control" id="transfer_date" name="transfer_date"
                                        value="{{ (isset($saving_lineitem)?$saving_lineitem->transfer_date:'') }}">
                                @if ($errors->has('transfer_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('transfer_date') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-2 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="control-label col-sm-2 text-right" for="img_path">Image</label>
                            <div class="col-sm-5">
                                @if(isset($saving_lineitem) && $saving_lineitem->img_path)
                                <a href="/storage/savings/{{$saving_lineitem->img_path}}" target="_blank">{{$saving_lineitem->img_path}}</a>
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
                            <label class="control-label col-sm-2 text-right" for="note">Note</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="note" name="note"
                                    row="5">{{ (old('note') ? old('note') : (isset($saving_lineitem) ?$saving_lineitem->note:"")) }}</textarea>
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
                                    @if(isset($saving_lineitem))
                                    Update
                                    @else
                                    Create
                                    @endif

                                </button>
                            </div>

                            <div class="text-center col-sm-4" style="padding-top:10px;">
                                <button type="button" class="btn btn-danger btn-block"
                                    onclick="window.location='/admin/savings/{{$saving->id}}';">
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
<script src="/js/saving_lineitem_add.js"></script>
@endsection
