<hr>
<!DOCTYPE html>
<HTML>
<head>
    <meta charset="UTF-8">
    <title>Camera</title>
    <link rel="stylesheet" href="css/cam.css">
</head>
<body style="background-color: pink;">
    <div class="c_upload">
        <input type="file" name="file" id="file" onchange="upload()">
    </div>
    <div class="mod_field">
        <div class="c_camera">
            <div class="camField">
                <video id="video" width="400" height="300"></video>
            </div>
            <div class="picField">
                <canvas id="canvas" width="400" height="300"></canvas>
            </div>
        </div>
        <div class="buts">
            <button id="clear" class="clrBtn" onclick="clearCanvas()">Clear</button>
            <button id="capture" class="capBtn" onclick="capture()">Capture</button>
            <form action="funcs/upload.php" method="POST">
                <input type="hidden" id="photo" name="image_data">
                <input name="call cam" type="submit" value=" Save pic " id="save" class="camBtn">
            </form>
        </div>
    </div>
    <script src="camera.js"></script>

</body>
</HTML>
<hr>
<?php
    include "head_foot/footer.html";
?>