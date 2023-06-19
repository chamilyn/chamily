@extends('layouts.client')
@section('assets')
    <link rel="stylesheet" href="/frontend/style_kongtun_aom.css">
@endsection
@section('content')
    <div class="container d-flex justify-content-center">
        <div class="mt-4 mb-4" style="width: 90%;">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                ยอดเงินสะสมทั้งหมดของคุณ</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{(isset($total_amount) ? number_format($total_amount,2) : '0.00')}}฿</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-trophy fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">ตารางอันดับประจำเดือน {{$current_month_year}}</h6>
                </div>
                <div class="card-body">
                    <div class="col p-4">
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
                                        $inx = 0;
                                        $changed_amount = 0.00;
                                    @endphp
                                    @if (isset($top_spenders))
                                        @foreach ($top_spenders as $top_spender)
                                            @php
                                                if ($changed_amount != $top_spender->total_amount) {
                                                    $inx++;
                                                    $changed_amount = $top_spender->total_amount;
                                                }
                                            @endphp
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
                                        @endforeach
                                    @endif
                                    <!--tr class="text-center" style="background-color: #fdbc4b; color: #FFFFFF;">
                                        <td><img src="/img/gold.png" width="30px" height="30px"></td>
                                        <td><b>001</b></td>
                                        <td><b>1000฿</b></td>
                                    </tr>
                                    <tr class="text-center" style="background-color: #9e9e9e; color: #FFFFFF;">
                                        <td><img src="/img\silver.png" width="30px" height="30px"></td>
                                        <td><b>002</b></td>
                                        <td><b>800฿</b></td>
                                    </tr>
                                    <tr class="text-center" style="background-color: #ce7430; color: #FFFFFF;">
                                        <td><img src="/img\copper.png" width="30px" height="30px"></td>
                                        <td>003</td>
                                        <td>500฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>4.</td>
                                        <td>004</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>5.</td>
                                        <td>005</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>6.</td>
                                        <td>006</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>7.</td>
                                        <td>007</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>8.</td>
                                        <td>008</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>9.</td>
                                        <td>009</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>10.</td>
                                        <td>010</td>
                                        <td>100฿</td>
                                    </tr-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">ตารางการออมในแต่ละเดือนของคุณ</h6>
                </div>
                <div class="card-body">
                    <div class="col p-4">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>ลำดับ</th>
                                        <th>เดือน</th>
                                        <th>จำนวน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $inx = 1;
                                    @endphp
                                    @if (isset($data_months))
                                            @foreach ($data_months as $data_month)
                                                <tr class="text-center">
                                                    <td>{{$inx}}.</td>
                                                    <td>{{$data_month->month}} {{$data_month->year}}</td>
                                                    <td>{{($data_month->amount ? number_format($data_month->amount,2) : '0.00')}}฿</td>
                                                </tr>
                                                @php
                                                    $inx++;
                                                @endphp
                                            @endforeach
                                    @endif
                                    <!--tr class="text-center">
                                        <td>2.</td>
                                        <td>เมษายน 2566</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>2.</td>
                                        <td>มีนาคม 2566</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>4.</td>
                                        <td>กุมพาพันธ์ 2566</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>5.</td>
                                        <td>มกราคม 2566</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>6.</td>
                                        <td>ธันวาคม 2565</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>7.</td>
                                        <td>พฤศจิกายน 2565</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>8.</td>
                                        <td>ตุลาคม 2565</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>9.</td>
                                        <td>กันยายน 2565</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>10.</td>
                                        <td>สิงหาคม 2565</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>11.</td>
                                        <td>กรกฎาคม 2565</td>
                                        <td>100฿</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>12.</td>
                                        <td>มิถุนายน 2565</td>
                                        <td>100฿</td>
                                    </tr-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection