@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="/frontend/stylewish.css?v={{ time() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
@endsection
@section('content')

    <div class='bodytextfalse mobile' style="display: none;">
        <div class="container mt-4 mb-4 d-flex justify-content-center">
            <h1>
                <b>
                    <font color="#AD464C">Make</font>
                    <font color="#3D5A48"> A </font>
                    <font color="#315468">Wish</font>
                </b>
                <i class="fa fa-tree" style="color: #3D5A48;"></i>
            </h1>
        </div>
        
        <div class="boxthetext">
            <p><textarea onkeyup='writeText(this)' id='textArea' placeholder='-Write Your Wish-' rows='2'
                    cols='31'></textarea></p>
        </div>

        <!--The parent container, image and container for text (to place over the image)-->
        <div class="mainContainer" id='mainContainer'>
            <!--The default image. You can select a different image too.-->
            <img src="img_wish/merry-christmas.jpg" id="myimage" alt=""/>
                    
            <!--The text, which is also draggable.-->
            <div id='theText' onmousedown='this.style.border = "dashed 2px #fabd4a";'>Sample Text</div>
        </div>

        <!--Button to save the image with the text.-->
        <p>
            <!-- <input type="button" onclick="saveImageWithText();" id="bt" value="Save the Image" /> -->
            <button class="button" type="button" onclick="saveImageWithText();" id="bt">Save Image</button>
        </p>
    </div>
    <br><br><div class="pc" style="display: none;" align='center'><font size=5>"เขียนคำอวยพรในเว็บไซต์บนโทรศัพท์"</font><br><br><br><img src='/img_champoo/champoo2.png' width='20%' height='20%'/></div>
@endsection
@section('scripts')
<script>
    function is_mobile() {
        let isMobile = /iPhone|iPad|iPod|Android|webOS|BlackBerry|Windows Phone/i.test(navigator.userAgent);
  
            if (isMobile) {
                $('.mobile').show();
            } else {
                $('.pc').show();
            }
        }
// Make the text element draggable.
$(document).ready(function() {
    is_mobile();
    $(function() {
        $('#theText').draggable({
            containment: 'parent' // set draggable area.
        });
    });

    $(document).keydown(function(event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
    });
});
let textContainer;
let t = 'Sample Text';
let writeText = (ele) => {
    t = ele.value;
    document.getElementById('theText').innerHTML = t.replace(/\n\r?/g, '<br />');
}

// Finally, save the image with text over it.
let saveImageWithText = () => {
    textContainer = document.getElementById('theText'); // The element with the text.

    // Create an image object.
    let img = new Image();
    img.src = document.getElementById('myimage').src;

    // Create a canvas object.
    let canvas = document.createElement("canvas");

    // Wait till the image is loaded.
    img.onload = function() {
        drawImage();
        downloadImage(img.src.replace(/^.*[\\\/]/, '')); // Download the processed image.
    }

    // Draw the image on the canvas.
    let drawImage = () => {
        let ctx = canvas.getContext("2d"); // Create canvas context.

        // Assign width and height.
        canvas.width = img.width;
        canvas.height = img.height;

        // Draw the image.
        ctx.drawImage(img, 0, 0);

        textContainer.style.border = 0;

        // Get the padding etc.
        let left = parseInt(window.getComputedStyle(textContainer).left);
        let right = textContainer.getBoundingClientRect().right;
        let top = parseInt(window.getComputedStyle(textContainer).top, 0);
        let center = textContainer.getBoundingClientRect().width / 2;
        //ปรับตำแหน่ง
        let paddingTop = '400';
        let paddingLeft = '200';
        let paddingRight = '250';

        // Get text alignement, colour and font of the text.
        let txtAlign = window.getComputedStyle(textContainer).textAlign;
        let color = window.getComputedStyle(textContainer).color;
        let fnt = window.getComputedStyle(textContainer).font;

        // Assign text properties to the context.
        ctx.font = fnt;
        ctx.fillStyle = color;
        ctx.textAlign = txtAlign;

        // Now, we need the coordinates of the text.
        let x; // coordinate.
        if (txtAlign === 'right') {
            x = right + parseInt(paddingRight) - 11;
        }
        if (txtAlign === 'left') {
            x = left + parseInt(paddingLeft);
        }
        if (txtAlign === 'center') {
            x = center + left;
        }

        // Get the text (it can a word or a sentence) to write over the image.
        let str = t.replace(/\n\r?/g, '<br />').split('<br />');

        // finally, draw the text using Canvas fillText() method.
        for (let i = 0; i <= str.length - 1; i++) {

            ctx.fillText(
                str[i]
                .replace('</div>', '')
                .replace('<br>', '')
                .replace(';', ''),
                x,
                parseInt(paddingTop, 10) + parseInt(top, 10) + 10 + (i * 55));
            // 55 ปรับระยะห่างบรรทัดในรูปภาพ
        }
    }

    // Download the processed image.
    let downloadImage = (img_name) => {
        let a = document.createElement('a');
        a.href = canvas.toDataURL("image/png");
        a.download = img_name;
        document.body.appendChild(a);
        a.click();
    }
}
</script>


<!-- Note
- อยากเปลี่ยนสีตัวอักษรคำที่จะใส่บนภาพให้เปลี่ยนที่ frontend/stylewish.css | #theText color
- อยากเปลี่ยนขนาดตัวอักษรคำที่จะใส่บนภาพให้เปลี่ยนที่ frontend/stylewish.css | #theText font-size
- ปรับตำแหน่งที่จะใส่บนภาพให้ปรับตรง script | paddingTop paddingLeft paddingRight
- เพิ่มลดปรับระยะห่างบรรทัดที่จะใส่บนภาพ script | (55) parseInt(paddingTop, 10) + parseInt(top, 10) + 10 + (i * 55); -->
@endsection