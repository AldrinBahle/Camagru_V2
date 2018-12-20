<?php
session_start();
require_once('../config/database.php');

if ($_POST['image_data']){
    $randomText = uniqid(rand(), true);
    $filename = $randomText.'.png';
    $img = '../gallery/'.$filename;
    $path = '../gallery/'.$filename;
    $src = explode(',', $_POST['image_data']);

    $name =$_SESSION['username'];

    try{
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("INSERT INTO `images` (`username`, `name`, `created`) VALUES ('" . $name . "', '" . $img . "', CURRENT_TIMESTAMP)");
        file_put_contents($path, base64_decode("$src[1]"));
        if ($query->execute())
            header("Location: ../front/welcome.php");
        else
            echo "failure";

    } catch(PDOException $e){
        echo "ERROR EXECUTING: \n".$e->getMessage();
    }
} else {
    header("Location: ../front/welcome.php");
}
?>