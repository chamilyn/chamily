@extends('layouts.admin')
@section('assets')

@endsection
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Savings</li>
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
                                onclick="window.location='/admin/savings/create';">
                                New Wallet
                                <span class="fas fa-plus" aria-hidden="true">
                                </span>
                            </button>
                        </div>
                        <div class="float-none"></div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-left">Name</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $x = 1;
                                @endphp
                                @if(isset($savings))
                                @foreach($savings as $saving)
                                    <tr saving_id="{{$saving->id}}">
                                        <td class="text-center">{{$x}}</td>
                                        <td class="text-left">{{$saving->name}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-sm" href="/admin/savings/{{$saving->id}}/edit">
                                                Edt
                                                <span aria-hidden="true" class="fas fa-list-alt"></span>
                                            </a>
                                            <a class="btn btn-danger btn-sm" del obj_id="{{$saving->id}}">
                                                Del
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
                            @if(isset($savings))
                            {{$savings->links()}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ URL::asset('/js/saving_list.js') }}?v={{ time() }}"></script>
@endsection
