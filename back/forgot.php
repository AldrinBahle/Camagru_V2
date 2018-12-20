<?php 
require_once '../config/connect.php';
$db = db_conn($DB_DSN, $DB_USER, $DB_PASSWORD);
$sql = "SELECT * FROM users";

$email = $_POST['email'];
$pswd = $_POST['pswd'];
$repswd = $_POST['re-pswd'];
$pswd = hash('whirlpool', $_POST['pswd']);

if ($pswd != $repswd)
{
    $_SESSION['err']['exists'] = "password do not match";
    header("Location: ../front/forgot.php");
}


try
    {   
        $sql = "UPDATE `users` SET `passwd` = '$pswd', `confirm_code`='N' WHERE email = '$email' ";
        $db->exec($sql);

        $reactivation_link = "http://localhost:8080/camagru/back/confirm.php?email=$_POST[email]";
        $message = "Hi ,\n\nYou are about to reset your password for your Camagru account. Please use the confirmation link below\n to complete the process.
        \nKind regards,\nCamagru Team.
        
        $reactivation_link
        ";
        mail($email, "Camagru Password Reset", $message);

        header("Location: ../front/signIn.php");
        exit();
    }
    catch (PDOException $e)
    {
        echo "Confirm Failed: <br/>".$e->getMessage();
        exit();
    }
    header("Location: ../front/forgot.php");
?>