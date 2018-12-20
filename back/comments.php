<?php 
require_once '../config/connect.php';
$db = db_conn($DB_DSN, $DB_USER, $DB_PASSWORD);

$comments = filter_var($_POST['comments'], FILTER_SANITIZE_STRING);
$username = $_SESSION['username'];

try
    {
        $sql = "INSERT INTO `comments`(`username`, `comment`, `image`) VALUES ('$username', '$comments', '$_GET[ID]')";
        $db->exec($sql);
    }
    catch (PDOException $e)
    {
        echo "Confirm Failed: <br/>".$e->getMessage();
        exit();
    }
    header("Location: ../front/my_gallery.php");
?>