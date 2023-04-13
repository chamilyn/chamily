<!doctype html>
<html>

<head>
    <title>Chamily</title>
    <link rel="shortcut icon" href="img_logo/Chamily_logo_color.png" />
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet"
        type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="frontend/stylewish.css">
</head>

<!-- logo&name -->
<div style="padding: 30px;" class="bodytexttrue">
    <div class="textheader">
        Chamily
    </div>
    <div class="logo">
        <img src="img_logo/Chamily_logo_color.png" width="50px" height="50px" />
    </div>
</div>

<body class="bodytexttrue">
    <h1>
        <font color="#AD464C">Make</font>
        <font color="#3D5A48"> A </font>
        <font color="#315468">Wish</font>
        <i class="fa fa-tree" style="color: #3D5A48;"></i>
    </h1>
    <div class="boxthetext">
        <p><textarea onkeyup='writeText(this)' id='textArea' placeholder='-Write Your Wish-' rows='2'
                cols='31'></textarea></p>
    </div>

    <div class='bodytextfalse'>
        <!--The parent container, image and container for text (to place over the image)-->
        <div class="mainContainer" id='mainContainer'>
            <!--The default image. You can select a different image too.-->
            <img src="/img_wish/merry-christmas.jpg" id="myimage" alt="" />

            <!--The text, which is also draggable.-->
            <div id='theText' onmousedown='this.style.border = "dashed 2px #fabd4a";'>Sample Text</div>
        </div>

        <!--Button to save the image with the text.-->
        <p>
            <!-- <input type="button" onclick="saveImageWithText();" id="bt" value="Save the Image" /> -->
            <button class="button" type="button" onclick="saveImageWithText();" id="bt">Save Image</button>
        </p>
    </div>
</body>
<script>
// Make the text element draggable.
$(document).ready(function() {
    $(function() {
        $('#theText').draggable({
            containment: 'parent' // set draggable area.
        });
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

<script>
$(document).keydown(function(event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
});
</script>

</html>