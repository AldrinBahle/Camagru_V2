<?php
    if (isset($_GET['page'])) {
        if($_GET['page'] < 0){
            $curpage = 0;
        }else{
            $curpage = $_GET['page'];
        }
    } else {
        $curpage = 0;
    }

    $pageNum;
    $curpager = $curpage;

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
            </div>
           
    </header>
</div>
<?php 
    require_once '../config/connect.php';
    $db = db_conn($DB_DSN, $DB_USER, $DB_PASSWORD);
    
    $count_page = $db->query("SELECT COUNT(*) FROM `images`", PDO::FETCH_ASSOC)->fetchColumn();
    
    if ($curpage < $count_page){
        $sql = "SELECT * FROM images ORDER BY created DESC LIMIT 5 OFFSET $curpage";
    }else{
        $curpage = $curpage - 5;
        $sql = "SELECT * FROM images ORDER BY created DESC LIMIT 5 OFFSET $curpage";
    }

    if ($curpager == 0){
        $pageNum = 1;
    } else {
        $pageNum = intdiv($curpage, 5) + 1;
    }

    try
    {
        foreach($db->query($sql) as $row)
        {
            echo "<img src='$row[name]'>";
        }
    }
    catch (PDOException $e)
    {
        echo "Failed: <br/>".$e->getMessage();
    }
    echo "<button><a href='../index.php'>back</a></button>";
?>

<div class="page" style="text-align: center; margin-top: 10px; ">
    <a class="page-link" style="color: black; display: inline;" href="?page=<?php echo $curpage-5?>">&laquo;</a>
    <?php echo "Page ".$pageNum;?>
    <a class="page-link" style="color: black; display: inline;" href="?page=<?php echo $curpage+5?>"> &raquo;</a>
</div>