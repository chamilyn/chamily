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
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum, perspiciatis blanditiis accusamus commodi consectetur id tempora rem iure eligendi quos eos et autem ratione exercitationem earum laborum ad a sequi!</p>
        </div>
    @endforeach
    <div class="card">
        <div style="text-align: center;">
            <b>
                <h4>We're always knew you could do it!</h4>
                <h4>So proud of you :)</h4>
            </b>
        </div>
    </div>
</div>
@else
    ไม่พบแคมเปญ
@endif
@endsection