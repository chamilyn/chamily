@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_drawing.css?v={{ time() }}">
@endsection
@section('content')
<form action="/feedbacks" class="form-horizontal prevent_submit" enctype="multipart/form-data" method="post">
{!! csrf_field() !!}
    @if (Session()->has('error'))
        <div class="alert alert-danger">
            {!! Session()->get('error') !!}
        </div>
        @if (Session()->has('message'))
            <div class="alert alert-danger">
                <ul class="mb-0 ml-2">
                    @foreach (Session()->get('message') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endif
    @if (Session()->has('success'))
        <div class="alert alert-success">
            {{ Session()->get('success') }}
        </div>
    @endif
    <div class="container">
        <section class="tools-board">
          <div class="row">
            <label class="title">Shapes</label>
            <ul class="options">
              <li class="option tool" id="rectangle">
                <img src="icons/rectangle.svg" alt="">
                <span>Rectangle</span>
              </li>
              <li class="option tool" id="circle">
                <img src="icons/circle.svg" alt="">
                <span>Circle</span>
              </li>
              <li class="option tool" id="triangle">
                <img src="icons/triangle.svg" alt="">
                <span>Triangle</span>
              </li>
              <li class="option">
                <input type="checkbox" id="fill-color">
                <label for="fill-color">Fill color</label>
              </li>
            </ul>
          </div>
          <div class="row">
            <label class="title">Options</label>
            <ul class="options">
              <li class="option active tool" id="brush">
                <img src="icons/brush.svg" alt="">
                <span>Brush</span>
              </li>
              <li class="option tool" id="eraser">
                <img src="icons/eraser.svg" alt="">
                <span>Eraser</span>
              </li>
              <li class="option">
                <input type="range" id="size-slider" min="1" max="30" value="5">
              </li>
            </ul>
          </div>
          <div class="row colors">
            <label class="title">Colors</label>
            <ul class="options">
              <li class="option"></li>
              <li class="option selected"></li>
              <li class="option"></li>
              <li class="option"></li>
              <li class="option">
                <input type="color" id="color-picker" value="#4A98F7">
              </li>
            </ul>
          </div>
          <div class="row buttons">
            <button type="button" class="clear-canvas">Clear Canvas</button>
            <button type="button" class="save-img">Save As Image</button>
            <button type="button" id="undo-btn"  class="save-img">Undo</button>
          </div>
          
        </section>
        <section class="drawing-board">
          <canvas></canvas>
        </section>
      </div>
</form>
@endsection
@section('scripts')
<script src="{{ URL::asset('/js/drawing.js') }}" defer></script>
@endsection
