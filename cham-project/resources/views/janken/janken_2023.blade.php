@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/stylejanken.css?v={{ time() }}">
<style>
    .landscape {
      transform: rotate(90deg);
      transform-origin: 50% 50%;
      width: 100vh;
      height: 100vw;
      top: 50%;
      left: 50%;
      position: absolute;
    }
  </style>
@endsection
@section('content')
    <div class="container mt-4">
        <!-- <h1 style="color:#FFFFFF;" class="text-center"><b>Janken Tournament 2023</b></h1> -->
        <div class="text-center">
            <img src="../img_logo/janken2023_logo.png" width="300px" height="150px"/>
            <hr width="100%" style="color:#FFFFFF;">                
        </div>
        <div class="card">
            <div class="container mt-2" style="text-align-last: end;">
                <div class="mt-2" style="float: left;">
                    <!--font size="1" color="red">*หน้าจอจะรีเฟรชอัตโนมัติทุก 3 นาทีหรือคลิกที่ปุ่ม</font-->&nbsp;                    
                    <button type="button" class="btn btn-secondary btn-sm" onclick="location.reload()"><span class=" fa fa-refresh fa-spin"></span></button>
                </div>
                <img src="../img_logo/Chamily_logo_color.png" width="50px" height="70px"/>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#round1">Round 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#round2">Round 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#round3">Round 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#round4">Round 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#round5">Round 5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#round6">Final Round</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#senbatsu">Senbatsu</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="round1">
                        <div class="row border g-0 rounded shadow-sm">
                            <div class="col p-4">
                                <div class="table-responsive">
                                    <h3>Round 0</h3>
                                                <h5 class="text-center">- Group A -</h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>First</th>
                                                            <th>VS</th>
                                                            <th>Second</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>1.</td>
                                                            <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                            <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                            <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h5 class="text-center">- Group B -</h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>First</th>
                                                            <th>VS</th>
                                                            <th>Second</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>1.</td>
                                                            <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                            <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                            <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h5 class="text-center">- Group C -</h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>First</th>
                                                            <th>VS</th>
                                                            <th>Second</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>1.</td>
                                                            <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                            <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                            <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h5 class="text-center">- Group D -</h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>First</th>
                                                            <th>VS</th>
                                                            <th>Second</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>1.</td>
                                                            <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                            <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                            <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                    <h3>Round 1</h3>
                                                <h5 class="text-center">- Group A -</h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>First</th>
                                                            <th>VS</th>
                                                            <th>Second</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>1.</td>
                                                            <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                            <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                            <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h5 class="text-center">- Group B -</h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>First</th>
                                                            <th>VS</th>
                                                            <th>Second</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>1.</td>
                                                            <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                            <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                            <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h5 class="text-center">- Group C -</h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>First</th>
                                                            <th>VS</th>
                                                            <th>Second</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>1.</td>
                                                            <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                            <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                            <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h5 class="text-center">- Group D -</h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>First</th>
                                                            <th>VS</th>
                                                            <th>Second</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>1.</td>
                                                            <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                            <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                            <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="round2">
                        <div class="row border g-0 rounded shadow-sm">
                            <div class="col p-4">
                            <div class="table-responsive">
                                    <h3>Round 2</h3>
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>First</th>
                                                <th>VS</th>
                                                <th>Second</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1.</td>
                                                <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="round3">
                        <div class="row border g-0 rounded shadow-sm">
                            <div class="col p-4">
                                <div class="table-responsive">
                                    <h3>Round 3</h3>
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>First</th>
                                                <th>VS</th>
                                                <th>Second</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1.</td>
                                                <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="round4">
                        <div class="row border g-0 rounded shadow-sm">
                            <div class="col p-4">
                                <div class="table-responsive">
                                    <h3>Round 4</h3>
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>First</th>
                                                <th>VS</th>
                                                <th>Second</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1.</td>
                                                <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="round5">
                        <div class="row border g-0 rounded shadow-sm">
                            <div class="col p-4">
                                <div class="table-responsive">
                                    <h3>Round 5</h3>
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>First</th>
                                                <th>VS</th>
                                                <th>Second</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1.</td>
                                                <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="round6">
                        <div class="row border g-0 rounded shadow-sm">
                            <div class="col p-4">
                                <div class="table-responsive">
                                    <h3>Round 6</h3>
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>First</th>
                                                <th>VS</th>
                                                <th>Second</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1.</td>
                                                <td style="background-color: #94C973;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                                <td style="width:20%;"><img src="image/.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/.png" width="30px" height="30px"></td>
                                                <td  style="background-color: #FA5F55;"><img src="image/janken2023/.jpg" class="rounded-circle" width="30px" height="30px">&ensp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="senbatsu">
                        <div class="row border g-0 rounded shadow-sm">
                            <div class="col p-4">
                                <div class="table-responsive">
                                    <h3 class="text-center">-Senbatsu-</h3>
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Senbatsu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td><img src="image/crown.png" width="50px" height="50px"></td>
                                                <td><img src="image/janken2023/.jpg" class="rounded-circle" width="50px" height="50px"></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td'2-16'</td>
                                                <td>
                                                    <img src="image/janken2023/.jpg" class="rounded-circle" width="50px" height="50px">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="fullscreenButton">Enter Fullscreen</button>
@endsection
@section('scripts')
<script>
    // Function to enter fullscreen mode for the div
    function enterFullscreen() {
      const fullscreenDiv = $('.tab-content')[0];
      if (fullscreenDiv.requestFullscreen) {
        fullscreenDiv.requestFullscreen();
      } else if (fullscreenDiv.mozRequestFullScreen) {
        fullscreenDiv.mozRequestFullScreen();
      } else if (fullscreenDiv.webkitRequestFullscreen) {
        fullscreenDiv.webkitRequestFullscreen();
      } else if (fullscreenDiv.msRequestFullscreen) {
        fullscreenDiv.msRequestFullscreen();
      }
    }
  
    $(document).ready(function() {
      $('#fullscreenButton').on('click', function() {
            enterFullscreen();
            $('.tab-content').addClass('landscape');
        });
    });
  </script>
@endsection