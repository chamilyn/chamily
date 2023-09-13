@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_card_congrat.css?v={{ time() }}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection
@section('content')
<div class="container mt-4 mb-4 d-flex justify-content-center">
    @if(isset($wishing_id) && $wishing_id)
    <div class="row" style="width: 90%;">
        <div class="text-center">
            <h2 style="color: #b68068;"><b>Congratulations!</b></h2>
        </div>
        Record : {{count($wishing_lineitems)}}
    </div>
    @else
        ไม่พบแคมเปญ
    @endif
</div>
@endsection