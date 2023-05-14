@extends('layouts.admin')
@section('assets')

@endsection
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><b>Wallet : </b>{{ (isset($saving) ? $saving->name : '-') }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="float-start">
                            <h5>List : {{ (isset($count) ? $count : '0') }}</h5>
                        </div>
                        <div class="float-end">
                            <button type="button" class="btn btn-primary btn-sm" id="bt_add"
                                onclick="window.location='/admin/savings/{{$saving->id}}/lineitem/create';">
                                New
                                <span class="fas fa-plus" aria-hidden="true">
                                </span>
                            </button>
                        </div>
                        <div class="float-none"></div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="saving_id" value="{{ (isset($saving) ? $saving->id : null) }}" />
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-left">Code</th>
                                    <th class="text-right">Amount</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $x = 1;
                                @endphp
                                @if(isset($saving_lineitems))
                                @foreach($saving_lineitems as $saving_lineitem)
                                    <tr saving_lineitem_id="{{$saving_lineitem->id}}">
                                        <td class="text-center">{{$x}}</td>
                                        <td class="text-center">
                                            {{$saving_lineitem->transfer ? $saving_lineitem->transfer->saving_code : '-' }}
                                        </td>
                                        <td class="text-right">{{$saving_lineitem->amount ? number_format($saving_lineitem->amount,2) : '0.00' }}</td>
                                        <td class="text-center">{{($saving_lineitem->transfer_date ? date('d/m/Y', strtotime($saving_lineitem->transfer_date)) : '-')}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-sm" href="/admin/savings/{{$saving->id}}/lineitem/{{$saving_lineitem->id}}/edit">
                                                <span aria-hidden="true" class="fas fa-list-alt"></span>
                                            </a>
                                            <a class="btn btn-danger btn-sm" del obj_id="{{$saving_lineitem->id}}">
                                                <span class="fas fa-trash-alt" aria-hidden="true" ></span>
                                            </a>
                                        </td>
                                    </tr>
                                @php
                                    $x++;
                                @endphp
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div id="paging_tab" class="d-flex justify-content-center">
                            @if(isset($saving_lineitems))
                            {{$saving_lineitems->links()}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ URL::asset('/js/saving_lineitem_list.js') }}?v={{ time() }}"></script>
@endsection
