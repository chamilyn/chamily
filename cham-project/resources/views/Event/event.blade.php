@extends('layouts.client')
@section('assets')
    <style>
        .template {
            display : none;
        }
    </style>
@endsection
@section('content')
    <div class="container mt-4 mb-4 d-flex justify-content-center">
        <div class="card" style="width: 90%;">
            <div class="card-body" style="text-align: -webkit-center;">
                <div class="container">
                    <h1 style="color:#000;" class="text-center"><b>Champoo Schedule</b></h1>
                </div>
                <div class="container mt-2" style="text-align-last: end;">
                    <div class="mt-2" style="float: left;">
                        <p class="textbgcl header_month">Jan 2023</p>
                    </div>
                    <button id="arrow_down" class="btn btn-warning" style="text-align-last: center;"><i class="fa fa-arrow-left" style="color: #FFFFFF;"></i></button>
                    <button id="arrow_up" class="btn btn-warning" style="text-align-last: center;"><i class="fa fa-arrow-right" style="color: #FFFFFF;"></i></button>
                </div>
                <hr width="95%"><!-- monthback=1|month=0|monthnext=1 -->
                <!-- ต่อจากนี้อาจเป็นloopวนโชว์ -->
                <div id="main_table" class="table-responsive">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body text-center">
                                    No Event on This Month
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="img_schedule/roadshow.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">22-23 Apr 2023</h5>
                                <p class="card-text">Roadshow แรกของซิง 6 ตะไมแชมไม่ไปง่ะคิดถึงสุดหัวใจเลย ;-;</p>
                                <a href="https://m.facebook.com/story.php?story_fbid=pfbid0ZAfQ7oPVvYuRn7D7BNS8ZTxk9Nj4naPt5CbxEkeSAYkej4u6NF5kYjjWpW1p9Xmtl&id=100044201777801&mibextid=qC1gEa" class="btn btn-primary">Detail</a>
                            </div>
                            </div>
                        </div>
                    </div-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ URL::asset('/js/event_client.js') }}"></script>
@endsection