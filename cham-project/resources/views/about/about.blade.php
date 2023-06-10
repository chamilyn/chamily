@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/style_about_new.css?v={{ time() }}">
@endsection
@section('content')
    <div class="container">
        <div class="circles"></div>
        <div class="details-container">
            <div class="avatar">
                <img src="/img_about/champoo_about.jpg" class="img-fluid" alt="">
            </div>
            <div class="about">
                <div class="name">
                    <p>
                        Kodchaporn Leelatheep
                    </p>
                    <h1>
                        Champoo CGM48
                    </h1>
                </div>
                <div class="about-content">
                    <p>
                        <!-- กชพร ลีละทีป (แชมพู) CGM48 Team C อายุ 17 ปี วันเกิด 10 ตุลาคม 2548 จังหวัด ลำปาง หมู่เลือด B สัญชาติ ไทย ราศี กันย์ -->
                        “สวัสดีค่ะ ชื่อ แชมพู กชพร ลีละทีป แชมเป็นคนสนุกสนาน ยิ้มง่าย ชอบรอยยิ้ม และเสียงหัวเราะ นอกจากนี้ยังชอบทำอะไรใหม่ ๆ ด้วยค่ะ แชมเป็นคนลำปาง เกิดวันที่ 10 ตุลาคม 2548 ปัจจุบันเป็นสมาชิกของ CGM48 และเป็นศิลปินจากค่าย Independent Records หรือ IR ค่ะ”
                    </p>
                    <ul class = "icons">
                        <li><a href="https://www.facebook.com/cgm48official.champoo" target="_blank"><i class = "fab fa-facebook-f" style="color: #4C4C6D;"></i></a></li>
                        <li><a href="https://www.instagram.com/champoo.cgm48official/?hl=th" target="_blank"><i class = "fab fa-instagram" style="color: #4C4C6D;"></i></a></li>                            
                        <li><a href="https://www.tiktok.com/@champoocgm48.official?_t=8XVplZQcOx7&amp;_r=1" target="_blank"><i class="fab fa-tiktok" style="color: #4C4C6D;"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="skills-container">
            <h2>อนุญาตให้ใช้ชีวิตในแบบที่ตัวเองชอบ✦</h2>
        </div>
    </div>

    <div>
        <section id=timeline>
            <h1>การเดินทางของแชมพู</h1>
            <p class="leader">โลกใบนี้เต็มไปด้วยสิ่งมหัศจรรย์มากมาย ถ้าหากคุณออกเดินทางไกลพอที่จะมองเห็นมัน</p>
            <div class="demo-card-wrapper">
                <div class="demo-card demo-card--step1">
                    <div class="head">
                        <div class="number-box">
                            <span>01</span>
                        </div>
                        <h2><span class="small">ปีแห่งการเริ่มต้น</span> 2019</h2>
                    </div>
                    <div class="body">
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p> -->
                        <img src="http://placehold.it/1000x500" alt="Graphic">
                    </div>
                </div>

                <div class="demo-card demo-card--step2">
                    <div class="head">
                        <div class="number-box">
                            <span>02</span>
                        </div>
                        <h2><span class="small">ปีแห่งการฝึกฝน</span> 2020</h2>
                    </div>
                    <div class="body">
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p> -->
                        <img src="http://placehold.it/1000x500" alt="Graphic">
                    </div>
                </div>

                <div class="demo-card demo-card--step3">
                    <div class="head">
                        <div class="number-box">
                            <span>03</span>
                        </div>
                        <h2><span class="small">ปีแห่งการเติบโต</span> 2021</h2>
                    </div>
                    <div class="body">
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p> -->
                        <img src="http://placehold.it/1000x500" alt="Graphic">
                    </div>
                </div>

                <div class="demo-card demo-card--step4">
                    <div class="head">
                        <div class="number-box">
                            <span>04</span>
                        </div>
                        <h2><span class="small">ปีแห่งการค้นพบ</span> 2022</h2>
                    </div>
                    <div class="body">
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p> -->
                        <img src="http://placehold.it/1000x500" alt="Graphic">
                    </div>
                </div>

                <div class="demo-card demo-card--step5">
                    <div class="head">
                        <div class="number-box">
                            <span>05</span>
                        </div>
                        <h2><span class="small">ปีแห่งการเรียนรู้</span> 2023</h2>
                    </div>
                    <div class="body">
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p> -->
                        <img src="http://placehold.it/1000x500" alt="Graphic">
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
