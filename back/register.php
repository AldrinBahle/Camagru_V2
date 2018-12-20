<?php
require_once '../config/connect.php';
$db = db_conn($DB_DSN, $DB_USER, $DB_PASSWORD);

function check_user($db, $usr, $email)
{
    $sql = "SELECT * FROM users";
    try
    {
        foreach($db->query($sql) as $row)
        {
            if ($usr == $row['username'] || $email == $row['email'])
                return (FALSE);
        }
    }
    catch (PDOException $e)
    {
        echo "Check_user Failed: <br/>".$e->getMessage();
    }
    return (TRUE);
}

function validate_data($db, $data)
{
    $_SESSION = FALSE;
    if (!preg_match("^[a-zA-Z]+$^", $data['username']))
        $_SESSION['err']['username'] = "Only letters and white space allowed";
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        $_SESSION['err']['email'] = "Invalid email format";
    if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/", $data['pswd']))
        $_SESSION['err']['pswd'] = "Password must have One Uppercase letter, a number and no less than than 6 characters!";
    if ($data['pswd'] != $data['re-pswd'])
        $_SESSION['err']['re-pswd'] = "Passwords does not match";
    if (!check_user($db, $data['username'], $data['email']))
        $_SESSION['err']['exists'] = "Username and/or email already exists";
    if (isset($_SESSION['err']))
        return (FALSE);
        else echo "please sign into your account to confirm registration";
    return (TRUE);
}

function store_tmp_data($db, $data)
{
    $usr = $data['username'];
    $pswd = hash('whirlpool', $data['pswd']);
    $email = $data['email'];
    $verfication_link = "http://localhost:8080/camagru/back/confirm.php?email=$_POST[email]";
    $sql = "INSERT INTO `users`(`username`, `email`, `passwd`) VALUES ('$usr', '$email', '$pswd')";
    
    try
    {
        $db->exec($sql);
        print($sql);
        
        $message = "Hi $usr,\n\nThanks for signing up with Camagru, your account has been created. Please use the confirmation link below\n to finalize your registration process.
        \nKind regards,\nCamagru Team.
        
        $verfication_link";
        mail($email, "Camagru Account Activation", $message);
        print ($str);
        return (TRUE);
    }
    catch (PDOException $e)
    {
        echo "Registration Failed: <br/>".$e->getMessage();
    }
    return (FALSE);
}

if (isset($_POST['reg_user']))
{
    $var = validate_data($db, $_POST);
    if ($var === TRUE)
    {
        store_tmp_data($db, $_POST);
        header("Location: ../front/signIn.php");
        return (TRUE);
    }
    header("Location: ../front/register.php");
}
?>