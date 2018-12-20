<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="content" style="height: 100px">
            <div class="topnav">
                <a class="active" href="../index.php">Home</a>
                <a href="my_gallery.php">My Gallery</a>
                <a href="profile.php">Profile</a>
                <a href="../back/signOut.php">Sign Out</a>
            </div>
            <h1> Camagru </h1>
    </header>
</div>
</div>
</div>
<div class="c_upload" style="margin-left: 300px; margin-top: 150px;">
    <input type="file" name="file" id="file">
</div>
<div class="mod_field" style="margin-left: 300px; margin-top: 30px;">
    <div class="c_camera">
        <div class="camField">
            <video id="video" width="400" height="300"></video>
        </div>
        <div class="picField">
            <canvas id="canvas" width="400" height="300"></canvas>
        </div>
        <div id="pose">
            <img id="e1" src="../img/img1.png" width="45%" height="130px" onclick="insertEmo('e1')" style="margin: 10px 2%;"/>
            <img id="e2" src="../img/img2.png" width="45%" height="130px" onclick="insertEmo('e2')" style="margin: 10px 2%;"/>
            <img id="e3" src="../img/img3.png" width="45%" height="130px" onclick="insertEmo('e3')" style="margin: 10px 2%;"/>
            <img id="e4" src="../img/img4.png" width="45%" height="130px" onclick="insertEmo('e4')" style="margin: 10px 2%;"/>
        </div>
    </div>
    <div class="buts">
        <button id="clear" class="clrBtn" onclick="clearCanvas()">Clear</button>
        <button id="capture" class="capBtn" onclick="capture()">Capture</button>
        <form action="../camera/upload.php" method="POST">
            <input type="hidden" id="photo" name="image_data">
            <input name="call cam" type="submit" value=" Save pic " id="save" class="camBtn">
        </form>
    </div>
</div>
    <script src="../camera/camera.js"></script>
</body>
</html>
