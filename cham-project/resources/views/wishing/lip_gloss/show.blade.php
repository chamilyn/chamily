@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_card_congrat2.css?v={{ time() }}">
@endsection
@section('content')
@if(isset($wishing_id) && $wishing_id)
<div class="container mt-4 mb-4 d-flex justify-content-center">
    <div style="text-align: center;">
        <b>
            <h1>Congratulations!</h1>
            <div style="text-align: -webkit-center;"><hr></div>                      
            <h4>✿ Kodchaporn Leelatheep ✿</h4>
        </b>
    </div>

</div>
<div class="wrapper">
    @foreach ($wishing_lineitems as $wishing_lineitem)
        <div class="card">
            <p>{{$wishing_lineitem->wish}}</p>
        </div>
    @endforeach
    <div class="card">
        <div style="text-align: center;">
            <b>
                <h4>We're always knew<br>you could do it!</h4><br>
                <h4>We're so proud of you :)</h4>
            </b>
        </div>
    </div>
</div>
@else
    ไม่พบแคมเปญ
@endif
@endsection
@section('scripts')
<script>
    /*$(document).ready(function() {
        $('.card').each(function(index) {
            $(this).css('top', `${20 * (index + 1)}px`);
        });
    });*/

</script>
@endsection