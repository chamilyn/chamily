@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_numbers.css?v={{ time() }}">
@endsection
@section('content')
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
    <div class="container mt-4 mb-4 d-flex justify-content-center">
            <div class="card" style="width: 90%;">
                <div class="card-body">
                    <div class="text-center">
                        <h3>
                            <b><span style="color:#89CFF0;">Random Number</span></b>
                            <i class="fa fa-gamepad" style="color: #89CFF0;"></i>
                        </h3>
                    </div>
                    <div style="text-align: -webkit-center;"><hr width="95%"></div>
                    <div class="mb-3">
                        <label for="start" class="form-label">ตั้งแต่หมายเลข</label>
                        <input type="number" class="form-control" id="start" name="start" value="">
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">ถึงหมายเลข</label>
                        <input type="number" class="form-control" id="end" name="end" value="">
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="is_dup" name="is_dup">
                        <label for="is_dup">ไม่ซ้ำ</label>
                    </div>
                    <div style="text-align: -webkit-center;">
                        <button type="button" id="random" class="btn btn-success">Go</button>
                        <button type="button" id="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4 mb-4 d-flex justify-content-center">
            <div class="card" style="width: 90%;">
                <div class="card-body">
                    <div class="text-center">
                        <h3>
                            <b><span style="color:#89CFF0;">Result</span></b>
                            <img src="/img_champooart/champoo_dead_sheep.png" width="70" height="70"></img>
                        </h3>
                    </div>
                    <!-- <div style="text-align: -webkit-center;"><hr width="90%" class="new5"></div> -->
                    <div style="text-align: -webkit-center;"><hr width="95%"></div>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col" style="border: 2px solid #89f0de; padding:5px; border-radius: 25px;">
                                <h3>
                                    <span>เลขที่สุ่ม </span>
                                    <div style="text-align: -webkit-center;"><hr width="90%" class="new1"></div>
                                    <p id="result"></p>
                                </h3>
                            </div>
                            &nbsp;&nbsp;
                            <div class="col" style="border: 2px solid #89CFF0; padding:5px; border-radius: 25px;">
                                <h3>
                                    <span>เลขทั้งหมด </span>
                                    <div style="text-align: -webkit-center;"><hr width="90%" class="new2"></div>
                                    <div id="results">[]</div>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
@endsection
@section('scripts')
<script>
        let array_number = [];
        let string_number = '';
        function getRandomInt(min, max, is_dup) {
            const range = max - min + 1;
            if (range <= array_number.length && is_dup) {
                alert('กรุณากด Reset เพื่อทำรายการใหม่');
                return false;
            }
            let num = Math.floor(Math.random() * range) + min;
            if (is_dup) {
                while (array_number.includes(num)) {
                    num = (num + 1 - min) % range + min;
                }
            }
            return num;
        }
        
        $(document).ready(function() {
            $('#random').click(function() {
                $(this).attr('disabled', true);
                let resultElement = $('#result');
                let start = $('#start').val();
                let end = $('#end').val();
                if(start === '' || end === '') {
                    alert('กรุณากรอกตัวเลขเริ่มต้นและสิ้นสุด');
                    $('#random').attr('disabled', false);
                    return false;
                }
                if(+start > +end) {
                    alert('กรุณากรอกตัวเลขเริ่มต้นน้อยกว่าตัวเลขสิ้นสุด');
                    $('#random').attr('disabled', false);
                    return false;
                }
                const range = (+end) - (+start) + 1;
                let is_dup = $("#is_dup").is(':checked');
                if (range <= array_number.length && is_dup) {
                    alert('กรุณากด Reset เพื่อทำรายการใหม่');
                    $('#random').attr('disabled', false);
                    return false;
                }
                resultElement.text('?');
                resultElement.removeClass('result');
                resultElement.width(); // Trigger reflow for animation
                let randomNumber = getRandomInt(+start, +end, is_dup);
                for (let i = 1; i <= 6; i++) {
                    setTimeout(function() {
                        randomNumber = getRandomInt(+start, +end, is_dup);
                        resultElement.html(`<b>${randomNumber}</b>`);
                        resultElement.addClass('fade-out');
                        resultElement.removeClass('result');
                    }, i * 150);
                    setTimeout(function() {
                        resultElement.removeClass('fade-out');
                        resultElement.width(); // Trigger reflow for animation
                        if (i == 6) {
                            string_number += `${(string_number===''?'':', ')}${randomNumber}`;
                            $("#results").html(`[${string_number}]`);
                            array_number.push(randomNumber);
                            $('#random').attr('disabled', false);
                        }
                    }, i * 150 + 150);
                }
                
            });

            $('#reset').click(function() {
                array_number = [];
                string_number = '';
                $("#results").html(`[${string_number}]`);
                let resultElement = $('#result');
                resultElement.text(null);
            });

            
        });
    </script>
@endsection
