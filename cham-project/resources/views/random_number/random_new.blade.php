@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_numbers_new.css?v={{ time() }}">
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
                            <!-- <b><span style="color:#89CFF0;">สุ่มจากตัวเลข</span></b>
                            <i class="fa fa-gamepad" style="color: #89CFF0;"></i> -->
                            <!-- ในกรณีเปลี่ยน TAB เป็นสุ่มชื่อให้ใช้เป็นตัวนี้ -->
                            <b><span style="color:#FFBF00;">สุ่มจากรายชื่อ</span></b>
                            <i class="fa fa-gamepad" style="color: #FFBF00;"></i>
                        </h3>
                    </div>

                    <div style="text-align: -webkit-center;"><hr width="95%"></div>

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#number">สุ่มจากตัวเลข</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#name">สุ่มจากรายชื่อ</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="number">
                            <div class="mb-3 mt-4">
                                <label for="start" class="form-label">ตั้งแต่หมายเลข</label>
                                <input type="number" class="form-control" id="start" name="start" value="">
                            </div>
                            <div class="mb-3">
                                <label for="end" class="form-label">ถึงหมายเลข</label>
                                <input type="number" class="form-control" id="end" name="end" value="">
                            </div>
                            <div class="mb-3 more_number" style="display: none;">
                                <label for="end" class="form-label">จำนวนที่ต้องการ</label>
                                <input type="number" class="form-control" id="more_number" name="more_number" value="">
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" id="is_dup" name="is_dup">
                                <label for="is_dup">สุ่มไม่ซ้ำ</label>

                                <input type="checkbox" id="is_more" name="is_more">
                                <label for="is_more">สุ่มหลายจำนวน</label>
                            </div>
                            <div style="text-align: -webkit-center;">
                                <button type="button" id="random" class="btn btn-success">Go</button>
                                <button type="button" id="reset" class="btn btn-danger">Reset</button>
                            </div>

                            <br><div class="text-center">
                                <h3>
                                    <b><span style="color:#89CFF0;">ผลลัพธ์</span></b>
                                    <img src="img_champooart/angelsheep.png" width="70" height="70"></img>
                                </h3>
                            </div>

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

                        <div class="tab-pane" id="name">
                            <div class="mb-3 mt-4">
                                <label for="name_random" class="form-label">รายชื่อที่ต้องการสุ่ม</label><br>
                                <textarea id="name_random" name="name_random" rows="4" cols="50" placeholder="หากต้องการใส่รายชื่อมากกว่า 1 คนให้เว้นบรรทัด"></textarea>
                            </div>
                            <!-- ก๊อปจากตัวเลขมารบกวนเช็กอีกที -->
                            <div class="mb-3 more_number" style="display: none;">
                                <label for="end" class="form-label">จำนวนที่ต้องการ</label>
                                <input type="number" class="form-control" id="more_number" name="more_number" value="">
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" id="is_dup" name="is_dup">
                                <label for="is_dup">สุ่มไม่ซ้ำ</label>

                                <input type="checkbox" id="is_more" name="is_more">
                                <label for="is_more">สุ่มหลายจำนวน</label>
                            </div>
                            <div style="text-align: -webkit-center;">
                                <button type="button" id="random" class="btn btn-success">Go</button>
                                <button type="button" id="reset" class="btn btn-danger">Reset</button>
                            </div>

                            <br><div class="text-center">
                                <h3>
                                    <b><span style="color:#FFBF00;">ผลลัพธ์</span></b>
                                    <img src="img_champooart/artist.png" width="70" height="70"></img>
                                </h3>
                            </div>

                            <div style="text-align: -webkit-center;"><hr width="95%"></div>

                            <div class="container text-center">
                                <div class="row">
                                    <div class="col" style="border: 2px solid #FF9839; padding:5px; border-radius: 25px;">
                                        <h3>
                                            <span>รายชื่อที่สุ่ม </span>
                                            <div style="text-align: -webkit-center;"><hr width="90%" class="new3"></div>
                                            <p id="result"></p>
                                        </h3>
                                    </div>
                                    &nbsp;&nbsp;
                                    <div class="col" style="border: 2px solid #FFBF00; padding:5px; border-radius: 25px;">
                                        <h3>
                                            <span>รายชื่อทั้งหมด </span>
                                            <div style="text-align: -webkit-center;"><hr width="90%" class="new4"></div>
                                            <div id="results">[]</div>
                                        </h3>
                                    </div>
                                </div>
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
            //$('.more_number').hide();
            $('#random').click(function() {
                $(this).attr('disabled', true);
                let resultElement = $('#result');
                let start = $('#start').val();
                let end = $('#end').val();
                let is_more = $('#is_more:checked').val();
                let more_number = $('#more_number').val();
                if (!is_more) {
                    more_number = 1;
                }
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
                if(is_more) {
                    if (more_number === '' || more_number == 0) {
                        alert('กรุณากรอกจำตัวเลขที่ต้องการสุ่ม');
                        $('#random').attr('disabled', false);
                        return false;
                    }
                    if (more_number > ((+end) - (+start) + 1) - array_number.length && is_dup) {
                        alert('กรุณากรอกจำตัวเลขน้อยกว่าที่ต้องการสุ่ม');
                        $('#random').attr('disabled', false);
                        return false;
                    }
                    
                }
                if (range <= array_number.length && is_dup) {
                    alert('กรุณากด Reset เพื่อทำรายการใหม่');
                    $('#random').attr('disabled', false);
                    return false;
                }
                resultElement.text('?');
                resultElement.removeClass('result');
                resultElement.width(); // Trigger reflow for animation
                for (let j = 0; j < more_number; j++) {
                    setTimeout(function() {
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
                                    if (j == more_number-1) {
                                        $('#random').attr('disabled', false);
                                    }
                                }
                            }, i * 150 + 150);
                        }
                    }, j * 1000);
                }
                
            });

            $('#reset').click(function() {
                array_number = [];
                string_number = '';
                $("#results").html(`[${string_number}]`);
                let resultElement = $('#result');
                resultElement.text(null);
            });

            $('#is_more').click(function() {
                let is_more = $('#is_more:checked').val();
                if (is_more) {
                    $('.more_number').show();
                } else {
                    $('.more_number').hide();
                }
                
            });

            
        });
    </script>
@endsection
