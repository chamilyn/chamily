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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="frontend/styletest_sd.css">
    </head>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img_logo/Chamily_logo_color.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                &nbsp;Chamily
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Wish</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <body>
        <div class="container mt-4 d-flex justify-content-center">
            <div class="card" style="width: 90%;">
                <div class="card-body" style="text-align: -webkit-center;">
                    <div class="container">
                        <h1 style="color:#000;" class="text-center"><b>Champoo Schedule</b></h1>
                    </div>
                    <div class="container mt-2" style="text-align-last: end;">
                        <div class="mt-2" style="float: left;">
                            <p class="textbgcl">Jan 2023</p>
                        </div>
                        <a  href="#"><button class="btn btn-warning" style="text-align-last: center;"><i class="fa fa-arrow-left"></i></button></a>
                        <a  href="#"><button class="btn btn-warning" style="text-align-last: center;"><i class="fa fa-arrow-right"></i></button></a>
                    </div>
                    <hr width="95%"><!-- monthback=1|month=0|monthnext=1 -->
                    <!-- ต่อจากนี้อาจเป็นloopวนโชว์ -->
                    <div class="table-responsive">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                <img src="img_schedule/sansei.jpg" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">12 Apr 2023</h5>
                                    <p class="card-text">Fist Perfomance พร้อมเชิญชวนทุกคนมาเล่นน้ำมาเอ็นจอยมาสนุกสนาน</p>
                                    <a href="https://m.facebook.com/story.php?story_fbid=pfbid0BgTzwA7EJ9FSYvy8BaN8nyVnALhs2ypJXUaVxozkv8KEuDd1iouBZvQGXXYdFw7Vl&id=100044201777801&mibextid=qC1gEa" class="btn btn-primary">Detail</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                <img src="img_schedule/roadshow.jpg" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">22-23 Apr 2023</h5>
                                    <p class="card-text">Roadshow แรกของซิง 6 ตะไมแชมไม่ไปง่ะคิดถึงสุดหัวใจเลย ;-;</p>
                                    <a href="https://m.facebook.com/story.php?story_fbid=pfbid0ZAfQ7oPVvYuRn7D7BNS8ZTxk9Nj4naPt5CbxEkeSAYkej4u6NF5kYjjWpW1p9Xmtl&id=100044201777801&mibextid=qC1gEa" class="btn btn-primary">Detail</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>