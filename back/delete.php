<?php
 require_once '../config/connect.php';
$db = db_conn($DB_DSN, $DB_USER, $DB_PASSWORD);

$username = $_SESSION['username'];

try
    {
        $sql = "DELETE FROM images WHERE id='$_GET[ID]'";
        $db->exec($sql);
    }
    catch (PDOException $e)
    {
        echo "Confirm Failed: <br/>".$e->getMessage();
        exit();
    }
    header("Location: ../front/my_gallery.php");
?>