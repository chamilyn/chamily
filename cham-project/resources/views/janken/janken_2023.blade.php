<!DOCTYPE html>
<html lang="en">
    <link rel="shortcut icon" href="../img_logo/Chamily_logo_color.png"/>
    <head>
        <title>Chamily</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../frontend/stylejanken.css">
    </head>

    <?php
        require('../config.php');

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully";
    ?>
    <body>
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
                                        <?php
                                            $sql_round0 = "SELECT * FROM janken2023 WHERE round = '0' ORDER BY matchs ASC";
                                            $result_round0 = mysqli_query($conn,$sql_round0) or die(mysql_error());
                                        ?>
                                        <?php $i_round0='1'; $chkgroup_round0='1'; while($r_round0 = mysqli_fetch_assoc($result_round0)){ ?>
                                            <?php if($r_round0['group'] == 'A'){ ?>
                                                <?php if($chkgroup_round0 == '1'){ ?>
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
                                                <?php $chkgroup_round0++; } ?>
                                                            <tr class="text-center">
                                                                <td><?php echo $i_round0.'.';?></td>
                                                                <td <?php if($r_round0['result'] == $r_round0['member_name1'] && $r_round0['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round0['result'] != $r_round0['member_name1'] && $r_round0['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round0['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round0['member_name1'];?></td>
                                                                <?php if($r_round0['result'] != ''){ ?>
                                                                    <td style="width:20%;"><img src="image/<?php echo $r_round0['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round0['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                                <?php }else{ ?>
                                                                    <td> VS </td>
                                                                <?php } ?>
                                                                <td <?php if($r_round0['result'] == $r_round0['member_name2'] && $r_round0['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round0['result'] != $r_round0['member_name2'] && $r_round0['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round0['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round0['member_name2'];?></td>
                                                            </tr>
                                            <?php }else if($r_round0['group'] == 'B'){ ?>
                                                <?php if($chkgroup_round0 == '2'){ ?>
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
                                                <?php $chkgroup_round0++; } ?>
                                                             <tr class="text-center">
                                                                <td><?php echo $i_round0.'.';?></td>
                                                                <td <?php if($r_round0['result'] == $r_round0['member_name1'] && $r_round0['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round0['result'] != $r_round0['member_name1'] && $r_round0['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round0['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round0['member_name1'];?></td>
                                                                <?php if($r_round0['result'] != ''){ ?>
                                                                    <td style="width:20%;"><img src="image/<?php echo $r_round0['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round0['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                                <?php }else{ ?>
                                                                    <td> VS </td>
                                                                <?php } ?>
                                                                <td <?php if($r_round0['result'] == $r_round0['member_name2'] && $r_round0['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round0['result'] != $r_round0['member_name2'] && $r_round0['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round0['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round0['member_name2'];?></td>
                                                            </tr>
                                            <?php }else if($r_round0['group'] == 'C'){ ?>
                                                <?php if($chkgroup_round0 == '3'){ ?>
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
                                                <?php $chkgroup_round0++; } ?>
                                                             <tr class="text-center">
                                                                <td><?php echo $i_round0.'.';?></td>
                                                                <td <?php if($r_round0['result'] == $r_round0['member_name1'] && $r_round0['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round0['result'] != $r_round0['member_name1'] && $r_round0['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round0['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round0['member_name1'];?></td>
                                                                <?php if($r_round0['result'] != ''){ ?>
                                                                    <td style="width:20%;"><img src="image/<?php echo $r_round0['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round0['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                                <?php }else{ ?>
                                                                    <td> VS </td>
                                                                <?php } ?>
                                                                <td <?php if($r_round0['result'] == $r_round0['member_name2'] && $r_round0['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round0['result'] != $r_round0['member_name2'] && $r_round0['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round0['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round0['member_name2'];?></td>
                                                            </tr>
                                            <?php }else if($r_round0['group'] == 'D'){ ?>
                                                <?php if($chkgroup_round0 == '4'){ ?>
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
                                                <?php $chkgroup_round0++; } ?>
                                                             <tr class="text-center">
                                                                <td><?php echo $i_round0.'.';?></td>
                                                                <td <?php if($r_round0['result'] == $r_round0['member_name1'] && $r_round0['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round0['result'] != $r_round0['member_name1'] && $r_round0['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round0['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round0['member_name1'];?></td>
                                                                <?php if($r_round0['result'] != ''){ ?>
                                                                    <td style="width:20%;"><img src="image/<?php echo $r_round0['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round0['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                                <?php }else{ ?>
                                                                    <td> VS </td>
                                                                <?php } ?>
                                                                <td <?php if($r_round0['result'] == $r_round0['member_name2'] && $r_round0['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round0['result'] != $r_round0['member_name2'] && $r_round0['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round0['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round0['member_name2'];?></td>
                                                            </tr>
                                            <?php } ?>
                                        <?php $i_round0++; } ?>
                                                        </tbody>
                                                    </table>
                                        <h3>Round 1</h3>
                                        <?php
                                            $sql_round1 = "SELECT * FROM janken2023 WHERE round = '1' ORDER BY matchs ASC";
                                            $result_round1 = mysqli_query($conn,$sql_round1) or die(mysql_error());
                                        ?>
                                        <?php $i_round1='1'; $chkgroup_round1='1'; while($r_round1 = mysqli_fetch_assoc($result_round1)){ ?>
                                            <?php if($r_round1['group'] == 'A'){ ?>
                                                <?php if($chkgroup_round1 == '1'){ ?>
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
                                                <?php $chkgroup_round1++; } ?>
                                                             <tr class="text-center">
                                                                <td><?php echo $i_round1.'.';?></td>
                                                                <?php if($r_round1['member_name1'] == ''){ ?>
                                                                    <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                                <?php }else{ ?>
                                                                    <td <?php if($r_round1['result'] == $r_round1['member_name1'] && $r_round1['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round1['result'] != $r_round1['member_name1'] && $r_round1['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round1['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round1['member_name1'];?></td>                                                                    
                                                                <?php } ?>
                                                                <?php if($r_round1['result'] != ''){ ?>
                                                                    <td style="width:20%;"><img src="image/<?php echo $r_round1['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round1['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                                <?php }else{ ?>
                                                                    <td> VS </td>
                                                                <?php } ?>
                                                                <td <?php if($r_round1['result'] == $r_round1['member_name2'] && $r_round1['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round1['result'] != $r_round1['member_name2'] && $r_round1['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round1['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round1['member_name2'];?></td>
                                                            </tr>
                                            <?php }else if($r_round1['group'] == 'B'){ ?>
                                                <?php if($chkgroup_round1 == '2'){ ?>
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
                                                <?php $chkgroup_round1++; } ?>
                                                             <tr class="text-center">
                                                                <td><?php echo $i_round1.'.';?></td>
                                                                <?php if($r_round1['member_name1'] == ''){ ?>
                                                                    <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                                <?php }else{ ?>
                                                                    <td <?php if($r_round1['result'] == $r_round1['member_name1'] && $r_round1['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round1['result'] != $r_round1['member_name1'] && $r_round1['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round1['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round1['member_name1'];?></td>                                                                    
                                                                <?php } ?>
                                                                <?php if($r_round1['result'] != ''){ ?>
                                                                    <td style="width:20%;"><img src="image/<?php echo $r_round1['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round1['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                                <?php }else{ ?>
                                                                    <td> VS </td>
                                                                <?php } ?>
                                                                <td <?php if($r_round1['result'] == $r_round1['member_name2'] && $r_round1['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round1['result'] != $r_round1['member_name2'] && $r_round1['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round1['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round1['member_name2'];?></td>
                                                            </tr>
                                            <?php }else if($r_round1['group'] == 'C'){ ?>
                                                <?php if($chkgroup_round1 == '3'){ ?>
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
                                                <?php $chkgroup_round1++; } ?>
                                                             <tr class="text-center">
                                                                <td><?php echo $i_round1.'.';?></td>
                                                                <?php if($r_round1['member_name1'] == ''){ ?>
                                                                    <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                                <?php }else{ ?>
                                                                    <td <?php if($r_round1['result'] == $r_round1['member_name1'] && $r_round1['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round1['result'] != $r_round1['member_name1'] && $r_round1['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round1['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round1['member_name1'];?></td>                                                                    
                                                                <?php } ?>
                                                                <?php if($r_round1['result'] != ''){ ?>
                                                                    <td style="width:20%;"><img src="image/<?php echo $r_round1['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round1['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                                <?php }else{ ?>
                                                                    <td> VS </td>
                                                                <?php } ?>
                                                                <td <?php if($r_round1['result'] == $r_round1['member_name2'] && $r_round1['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round1['result'] != $r_round1['member_name2'] && $r_round1['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round1['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round1['member_name2'];?></td>
                                                            </tr>
                                            <?php }else if($r_round1['group'] == 'D'){ ?>
                                                <?php if($chkgroup_round1 == '4'){ ?>
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
                                                <?php $chkgroup_round1++; } ?>
                                                             <tr class="text-center">
                                                                <td><?php echo $i_round1.'.';?></td>
                                                                <?php if($r_round1['member_name1'] == ''){ ?>
                                                                    <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                                <?php }else{ ?>
                                                                    <td <?php if($r_round1['result'] == $r_round1['member_name1'] && $r_round1['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round1['result'] != $r_round1['member_name1'] && $r_round1['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round1['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round1['member_name1'];?></td>                                                                    
                                                                <?php } ?>
                                                                <?php if($r_round1['result'] != ''){ ?>
                                                                    <td style="width:20%;"><img src="image/<?php echo $r_round1['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round1['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                                <?php }else{ ?>
                                                                    <td> VS </td>
                                                                <?php } ?>
                                                                <td <?php if($r_round1['result'] == $r_round1['member_name2'] && $r_round1['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round1['result'] != $r_round1['member_name2'] && $r_round1['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round1['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round1['member_name2'];?></td>
                                                            </tr>
                                            <?php } ?>
                                        <?php $i_round1++; } ?>
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
                                        <?php
                                            $sql_round2 = "SELECT * FROM janken2023 WHERE round = '2' ORDER BY matchs ASC";
                                            $result_round2 = mysqli_query($conn,$sql_round2) or die(mysql_error());
                                        ?>
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
                                                <?php $i_round2='1'; while($r_round2 = mysqli_fetch_assoc($result_round2)){ ?>
                                                    <tr class="text-center">
                                                        <td><?php echo $i_round2.'.';?></td>
                                                        <?php if($r_round2['member_name1'] == ''){ ?>
                                                            <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                        <?php }else{ ?>
                                                            <td <?php if($r_round2['result'] == $r_round2['member_name1'] && $r_round2['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round2['result'] != $r_round2['member_name1'] && $r_round2['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round2['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round2['member_name1'];?></td>                                                                    
                                                        <?php } ?>
                                                        <?php if($r_round2['result'] != ''){ ?>
                                                            <td style="width:20%;"><img src="image/<?php echo $r_round2['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round2['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                        <?php }else{ ?>
                                                            <td> VS </td>
                                                        <?php } ?>
                                                        <?php if($r_round2['member_name2'] == ''){ ?>
                                                            <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                        <?php }else{ ?>
                                                            <td <?php if($r_round2['result'] == $r_round2['member_name2'] && $r_round2['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round2['result'] != $r_round2['member_name2'] && $r_round2['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round2['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round2['member_name2'];?></td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php $i_round2++; } ?>
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
                                        <?php
                                            $sql_round3 = "SELECT * FROM janken2023 WHERE round = '3' ORDER BY matchs ASC";
                                            $result_round3 = mysqli_query($conn,$sql_round3) or die(mysql_error());
                                        ?>
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
                                                <?php $i_round3='1'; while($r_round3 = mysqli_fetch_assoc($result_round3)){ ?>
                                                    <tr class="text-center">
                                                        <td><?php echo $i_round3.'.';?></td>
                                                        <?php if($r_round3['member_name1'] == ''){ ?>
                                                            <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                        <?php }else{ ?>
                                                            <td <?php if($r_round3['result'] == $r_round3['member_name1'] && $r_round3['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round3['result'] != $r_round3['member_name1'] && $r_round3['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round3['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round3['member_name1'];?></td>                                                                    
                                                        <?php } ?>
                                                        <?php if($r_round3['result'] != ''){ ?>
                                                            <td style="width:20%;"><img src="image/<?php echo $r_round3['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round3['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                        <?php }else{ ?>
                                                            <td> VS </td>
                                                        <?php } ?>
                                                        <?php if($r_round3['member_name2'] == ''){ ?>
                                                            <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                        <?php }else{ ?>
                                                            <td <?php if($r_round3['result'] == $r_round3['member_name2'] && $r_round3['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round3['result'] != $r_round3['member_name2'] && $r_round3['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round3['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round3['member_name2'];?></td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php $i_round3++; } ?>
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
                                        <?php
                                            $sql_round4 = "SELECT * FROM janken2023 WHERE round = '4' ORDER BY matchs ASC";
                                            $result_round4 = mysqli_query($conn,$sql_round4) or die(mysql_error());
                                        ?>
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
                                                <?php $i_round4='1'; while($r_round4 = mysqli_fetch_assoc($result_round4)){ ?>
                                                    <tr class="text-center">
                                                        <td><?php echo $i_round4.'.';?></td>
                                                        <?php if($r_round4['member_name1'] == ''){ ?>
                                                            <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                        <?php }else{ ?>
                                                            <td <?php if($r_round4['result'] == $r_round4['member_name1'] && $r_round4['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round4['result'] != $r_round4['member_name1'] && $r_round4['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round4['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round4['member_name1'];?></td>                                                                    
                                                        <?php } ?>
                                                        <?php if($r_round4['result'] != ''){ ?>
                                                            <td style="width:20%;"><img src="image/<?php echo $r_round4['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round4['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                        <?php }else{ ?>
                                                            <td> VS </td>
                                                        <?php } ?>
                                                        <?php if($r_round4['member_name2'] == ''){ ?>
                                                            <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                        <?php }else{ ?>
                                                            <td <?php if($r_round4['result'] == $r_round4['member_name2'] && $r_round4['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round4['result'] != $r_round4['member_name2'] && $r_round4['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round4['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round4['member_name2'];?></td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php $i_round4++; } ?>
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
                                        <?php
                                            $sql_round5 = "SELECT * FROM janken2023 WHERE round = '5' ORDER BY matchs ASC";
                                            $result_round5 = mysqli_query($conn,$sql_round5) or die(mysql_error());
                                        ?>
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
                                                <?php $i_round5='1'; while($r_round5 = mysqli_fetch_assoc($result_round5)){ ?>
                                                    <tr class="text-center">
                                                        <td><?php echo $i_round5.'.';?></td>
                                                        <?php if($r_round5['member_name1'] == ''){ ?>
                                                            <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                        <?php }else{ ?>
                                                            <td <?php if($r_round5['result'] == $r_round5['member_name1'] && $r_round5['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round5['result'] != $r_round5['member_name1'] && $r_round5['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round5['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round5['member_name1'];?></td>                                                                    
                                                        <?php } ?>
                                                        <?php if($r_round5['result'] != ''){ ?>
                                                            <td style="width:20%;"><img src="image/<?php echo $r_round5['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round5['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                        <?php }else{ ?>
                                                            <td> VS </td>
                                                        <?php } ?>
                                                        <?php if($r_round5['member_name2'] == ''){ ?>
                                                            <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                        <?php }else{ ?>
                                                            <td <?php if($r_round5['result'] == $r_round5['member_name2'] && $r_round5['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round5['result'] != $r_round5['member_name2'] && $r_round5['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round5['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round5['member_name2'];?></td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php $i_round5++; } ?>
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
                                        <?php
                                            $sql_round6 = "SELECT * FROM janken2023 WHERE round = '6' ORDER BY matchs ASC";
                                            $result_round6 = mysqli_query($conn,$sql_round6) or die(mysql_error());
                                        ?>
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
                                                <?php $i_round6='1'; while($r_round6 = mysqli_fetch_assoc($result_round6)){ ?>
                                                    <tr class="text-center">
                                                        <td><?php echo $i_round6.'.';?></td>
                                                        <?php if($r_round6['member_name1'] == ''){ ?>
                                                            <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                        <?php }else{ ?>
                                                            <td <?php if($r_round6['result'] == $r_round6['member_name1'] && $r_round6['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round6['result'] != $r_round6['member_name1'] && $r_round6['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round6['member_name1']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round6['member_name1'];?></td>                                                                    
                                                        <?php } ?>
                                                        <?php if($r_round6['result'] != ''){ ?>
                                                            <td style="width:20%;"><img src="image/<?php echo $r_round6['member_rps1']; ?>.png" width="30px" height="30px">&nbsp;VS&nbsp;<img src="image/<?php echo $r_round6['member_rps2']; ?>.png" width="30px" height="30px"></td>
                                                        <?php }else{ ?>
                                                            <td> VS </td>
                                                        <?php } ?>
                                                        <?php if($r_round6['member_name2'] == ''){ ?>
                                                            <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                        <?php }else{ ?>
                                                            <td <?php if($r_round6['result'] == $r_round6['member_name2'] && $r_round6['result'] != ''){ ?> style="background-color: #94C973;" <?php }else if($r_round6['result'] != $r_round6['member_name2'] && $r_round6['result'] != ''){ ?> style="background-color: #FA5F55;" <?php } ?>><img src="image/janken2023/<?php echo $r_round6['member_name2']; ?>.jpg" class="rounded-circle" width="30px" height="30px">&ensp;<?php echo $r_round6['member_name2'];?></td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php $i_round6++; } ?>
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
                                        <?php
                                            $sql_senbatsu = "SELECT * FROM janken2023 WHERE matchs IN ('43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','73') ORDER BY matchs ASC";
                                            $result_senbatsu = mysqli_query($conn,$sql_senbatsu) or die(mysql_error());

                                            $count_senbatsu='0';
                                            while($r_senbatsu = mysqli_fetch_assoc($result_senbatsu)){
                                                if($r_senbatsu['matchs'] == '73' && $r_senbatsu['result'] != ''){
                                                    $first_place = $r_senbatsu['result'];
                                                }else{
                                                    if($r_senbatsu['result'] != ''){
                                                        $rating[] = $r_senbatsu['result'];
                                                        $count_senbatsu++;                                                        
                                                    }
                                                }
                                            }
                                            if($first_place != ''){
                                                if (($key = array_search($first_place, $rating)) !== false) {
                                                    unset($rating[$key]);
                                                    $rating = array_values($rating);
                                                    $count_senbatsu = count($rating);
                                                }
                                            }
                                        ?>
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
                                                    <?php if($first_place == ''){ ?>
                                                        <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                    <?php }else{ ?>
                                                        <td><img src="image/janken2023/<?php echo $first_place; ?>.jpg" class="rounded-circle" width="50px" height="50px"></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><?php echo '2-16';?></td>
                                                    <?php if($count_senbatsu == '0'){ ?>
                                                        <td style="color: #D3D3D3;">รอผู้ชนะ</td>
                                                    <?php }else{ ?>
                                                        <td>
                                                            <?php for($i=0;$i<$count_senbatsu;$i++){ ?>
                                                                <img src="image/janken2023/<?php echo $rating[$i]; ?>.jpg" class="rounded-circle" width="50px" height="50px">
                                                            <?php } ?>
                                                        </td>
                                                    <?php } ?>
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

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>