<?php 
require_once '../config/connect.php';
$db = db_conn($DB_DSN, $DB_USER, $DB_PASSWORD);
$sql = "SELECT * FROM users";
$email = $_GET['email'];

try
    {   
        $sql = "UPDATE `users` SET `confirm_code`='Y' WHERE email = '$email' ";
        $db->exec($sql);
        header("Location: ../front/signIn.php");
    }
    catch (PDOException $e)
    {
        echo "Confirm Failed: <br/>".$e->getMessage();
        exit();
    }
?>