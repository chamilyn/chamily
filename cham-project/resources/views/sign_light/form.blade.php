@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_frm_neon_sign.css?v={{ time() }}">
@endsection
@section('content')<div class="container mt-4 mb-4 d-flex justify-content-center">
    <div class="card" style="width: 90%; background-color: #000;">
        <div class="card-body">
            <div class="text-center">
                <h1 style="color: #FFF;"><b>ป้ายไฟ</b></h1>
            </div>
            <div style="text-align: -webkit-center; color:#FFF;"><hr width="95%"></div>
            <form action="/ledlight" method="POST" name="form1" enctype="multipart/form-data" class="form-inline">
                {!! csrf_field() !!}
                <div class="mb-3">
                    <label for="text_sign" class="form-label"><font color="white">ข้อความที่อยากแสดงบนป้ายไฟ</font>&nbsp;<font color="red">(50 ตัวอักษร)</font></label>
                    <input type="text" class="form-control" id="text_sign" name="text_sign" value="" maxlength="50" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="text_color" class="form-label"><font color="white">สีที่ต้องการ</font></label>
                    <!-- ยังไม่ได้ -->
                    <div class="custom-radios">
                        <div>
                            <input type="radio" id="color-1" name="text_color" value="neonTextRed" checked>
                            <label for="color-1">
                                <span>
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                </span>
                            </label>
                        </div>
                        
                        <div>
                            <input type="radio" id="color-2" name="text_color" value="neonTextGreen">
                            <label for="color-2">
                            <span>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-3" name="text_color" value="neonTextBlue">
                            <label for="color-3">
                            <span>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-4" name="text_color" value="neonTextPink">
                            <label for="color-4">
                            <span>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-5" name="text_color" value="neonTextWhite">
                            <label for="color-5">
                            <span>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-6" name="text_color" value="neonTextYellow">
                            <label for="color-6">
                            <span>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-7" name="text_color" value="neonTextLightBlue">
                            <label for="color-7">
                            <span>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-8" name="text_color" value="neonTextLightYellow">
                            <label for="color-8">
                            <span>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-9" name="text_color" value="neonTextPurple">
                            <label for="color-9">
                            <span>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-10" name="text_color" value="neonTextOrange">
                            <label for="color-10">
                            <span>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-11" name="text_color" value="neonTextGreenYellow">
                            <label for="color-11">
                            <span>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="color-12" name="text_color" value="neonTextGreenMint">
                            <label for="color-12">
                            <span>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                            </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div  style="text-align: -webkit-center;" class="mt-4">
                    <button type="submit" class="custom-btn btn-11">เปิดป้ายไฟ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection