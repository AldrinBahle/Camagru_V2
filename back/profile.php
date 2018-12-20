<?php 
require_once '../config/connect.php';
$db = db_conn($DB_DSN, $DB_USER, $DB_PASSWORD);
$sql = "SELECT * FROM users";

$username = $_SESSION['username'];
$email = $_POST['email'];
$pswd = $_POST['pswd'];
$repswd = $_POST['re-pswd'];
$pswd = hash('whirlpool', $_POST['pswd']);


if ($pswd != $repswd)
{
    $_SESSION['err']['exists'] = "password do not match";
    header("Location: ../front/profile.php");
    exit();
}

try
    {   
        $sql = "UPDATE `users` SET `email` = '$email', `passwd` = '$pswd' WHERE username = '$username' ";
        $db->exec($sql);

        header("Location: ../front/welcome.php");
        exit();
    }
    catch (PDOException $e)
    {
        echo "Confirm Failed: <br/>".$e->getMessage();
        exit();
    }
    header("Location: ../front/profile.php");
?>