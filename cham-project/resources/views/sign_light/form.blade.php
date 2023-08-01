@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_frm_neon_sign.css?v={{ time() }}">
@endsection
@section('content')
<div class="container mt-4 mb-4 d-flex justify-content-center">
    <div class="card" style="width: 90%; background-color: #000;">
        <div class="card-body">
            <div class="text-center">
                <h1 style="color: #FFF;"><b>LED LIGHT</b></h1>
            </div>
            <div style="text-align: -webkit-center; color:#FFF;"><hr width="95%"></div>
            <form id="sign_light_form" action="/ledlight" method="POST" name="form1" enctype="multipart/form-data" class="form-inline">
            {!! csrf_field() !!}
                <div class="mb-3">
                    <label for="text_sign" class="form-label"><font color="white">ข้อความที่อยากแสดงบนป้ายไฟ</font>&nbsp;<font color="red">(50 ตัวอักษร)</font></label>
                    <input type="text" class="form-control" id="text_sign" name="text_sign" value="" maxlength="50" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="text_size" class="form-label"><font color="white">ขนาดของข้อความ</font></label>
                    <select class="form-select" aria-label="Default select example" id="text_size" name="text_size">
                        <option selected>เลือกขนาดของข้อความที่ต้องการ</option>
                        <option value="12">ขนาดเล็ก</option>
                        <option value="16">ขนาดกลาง</option>
                        <option value="20">ขนาดใหญ่</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="text_color" class="form-label"><font color="white">สีที่ต้องการ</font></label>
                    <!-- ยังไม่ได้ -->
                    <div class="custom-radios">
                        <div>
                            <input type="radio" id="color-1" name="text_color" value="neonTextRed" checked>
                            <label for="color-1">
                                <span>
                                    <img src="/img/checkwhite.png" alt="Checked Icon" />
                                </span>
                            </label>
                        </div>
                        
                        <div>
                            <input type="radio" id="color-2" name="text_color" value="neonTextGreen">
                            <label for="color-2">
                            <span>
                                <img src="/img/checkwhite.png" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-3" name="text_color" value="neonTextBlue">
                            <label for="color-3">
                            <span>
                                <img src="/img/checkwhite.png" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-4" name="text_color" value="neonTextPink">
                            <label for="color-4">
                            <span>
                                <img src="/img/checkwhite.png" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-5" name="text_color" value="neonTextWhite">
                            <label for="color-5">
                            <span>
                                <img src="/img/checkblack.png" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-6" name="text_color" value="neonTextYellow">
                            <label for="color-6">
                            <span>
                                <img src="/img/checkwhite.png" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-7" name="text_color" value="neonTextLightBlue">
                            <label for="color-7">
                            <span>
                                <img src="/img/checkwhite.png" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-8" name="text_color" value="neonTextLightYellow">
                            <label for="color-8">
                            <span>
                                <img src="/img/checkwhite.png" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-9" name="text_color" value="neonTextPurple">
                            <label for="color-9">
                            <span>
                                <img src="/img/checkwhite.png" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-10" name="text_color" value="neonTextOrange">
                            <label for="color-10">
                            <span>
                                <img src="/img/checkwhite.png" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-11" name="text_color" value="neonTextGreenYellow">
                            <label for="color-11">
                            <span>
                                <img src="/img/checkwhite.png" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-12" name="text_color" value="neonTextGreenMint">
                            <label for="color-12">
                            <span>
                                <img src="/img/checkwhite.png" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="checkbox" option="move" id="text_move1" name="text_move[]" checked>
                    <label for="text_move1"><font color="white">ข้อความแบบเลื่อน</font></label> &nbsp;
                    <input type="checkbox" option="not_move" id="text_move2" name="text_move[]">
                    <label for="text_move2"><font color="white">ข้อความแบบหยุดนิ่ง</font></label>
                    <input type="hidden" option="not_move" id="text_move_val" name="text_move_val" value="move">
                </div>
                <div  style="text-align: -webkit-center;" class="mt-4">
                    <button type="submit" class="custom-btn btn-11">เปิดป้ายไฟ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $("input:checkbox").on('click', function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });
        $("#sign_light_form").submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting by default
        
            // Get the input value
            let inputValue = $("#text_sign").val().trim();
            let tex_size = $("#text_size").val();
            // Check if the input is empty
            if (inputValue === "") {
                alert("กรุณากรอกข้อความ.");
                return false;
            }

            if (!tex_size) {
                alert("กรุณากรอกเลือกขนาดอักษร.");
                return false;
            }
            if ($('#text_move1').is(':checked')) {
                $("#text_move_val").val("move");
            }
            if ($('#text_move2').is(':checked')) {
                $("#text_move_val").val("not_move");
            }
            $('#sign_light_form')[0].submit();
            
        });

        $("#text_move1 , #text_move2").on('click', function() {
            $("#text_move_val").val($(this).attr('option'));
        });
    });
    </script>
@endsection