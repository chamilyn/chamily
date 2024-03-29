@extends('layouts.admin')
@section('assets')
<style>
    body {
        /* background-color: #F0F3F4; */
        background-color: #FFFFFF;
        height: 100%;
        background-size: cover;
        background-position: center;
    }

    .table-responsive {
        max-height: 100px;
        overflow: scroll;
    }
</style>
@endsection
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Savings</li>
            </ol>
        </nav>

        <div class="row d-flex justify-content-center">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 mt-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    เงินทั้งหมดของกองทุน</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{(isset($total_amount) ? number_format($total_amount,2) : '0.00')}}฿</div>
                            </div>
                            <div class="col-auto">
                                <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                <i class="fas fa-trophy fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 mt-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            ตารางอันดับประจำเดือน {{$current_month_year}}</div>
                        </div>
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ลำดับ</th>
                                            <th>ชื่อ</th>
                                            <th>จำนวน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $inx = 1;
                                            $changed_amount = 0.00;
                                        @endphp
                                        @if (isset($top_spenders))
                                            @foreach ($top_spenders as $top_spender)
                                                @if ($inx == 1)
                                                    <tr class="text-center" style="background-color: #fdbc4b; color: #FFFFFF;">
                                                        <td><img src="/img/gold.png" width="30px" height="30px"></td>
                                                        <td><b>{{$top_spender->saving_code}}</b></td>
                                                        <td><b>{{($top_spender->total_amount ? number_format($top_spender->total_amount,2) : '0.00')}}฿</b></td>
                                                    </tr>
                                                @elseif ($inx == 2)
                                                    <tr class="text-center" style="background-color: #9e9e9e; color: #FFFFFF;">
                                                        <td><img src="/img\silver.png" width="30px" height="30px"></td>
                                                        <td><b>{{$top_spender->saving_code}}</b></td>
                                                        <td><b>{{($top_spender->total_amount ? number_format($top_spender->total_amount,2) : '0.00')}}฿</b></td>
                                                    </tr>
                                                @elseif ($inx == 3)
                                                    <tr class="text-center" style="background-color: #ce7430; color: #FFFFFF;">
                                                        <td><img src="/img\copper.png" width="30px" height="30px"></td>
                                                        <td><b>{{$top_spender->saving_code}}</b></td>
                                                        <td><b>{{($top_spender->total_amount ? number_format($top_spender->total_amount,2) : '0.00')}}฿</b></td>
                                                    </tr>
                                                @else
                                                    <tr class="text-center">
                                                        <td>{{$inx}}.</td>
                                                        <td>{{$top_spender->saving_code}}</td>
                                                        <td>{{($top_spender->total_amount ? number_format($top_spender->total_amount,2) : '0.00')}}฿</td>
                                                    </tr>
                                                @endif
                                                @php
                                                    if ($changed_amount != $top_spender->total_amount) {
                                                        $inx++;
                                                        $changed_amount = $top_spender->total_amount;
                                                    }
                                                @endphp
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 mt-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">ยอดรวมการออมของสมาชิกทั้งหมด
                                </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ชื่อ</th>
                                            <th>ยอดรวม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- เรียงตามยอดออมสูงสุด -->
                                        @php
                                        $inx = 1;
                                        $changed_amount = 0.00;
                                        @endphp
                                        @if (isset($saving_lineitems))
                                            @foreach ($saving_lineitems as $saving_lineitem)
                                                <tr class="text-center">
                                                    <td>{{$saving_lineitem->saving_code}}</td>
                                                    <td>{{($saving_lineitem->total_amount ? number_format($saving_lineitem->total_amount,2) : '0.00')}}฿</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                New
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
                                        <td class="text-left">
                                            <a href="/admin/savings/{{$saving->id}}">
                                                {{$saving->name}}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-sm" href="/admin/savings/{{$saving->id}}/edit">
                                                <span aria-hidden="true" class="fas fa-list-alt"></span>
                                            </a>
                                            <a class="btn btn-danger btn-sm" del obj_id="{{$saving->id}}">
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
