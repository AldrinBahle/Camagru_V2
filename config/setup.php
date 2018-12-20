<?php
include_once("connect.php");

if (1)
{
    try
    {
        $conn = db_conn("mysql:host=localhost;", $DB_USER, $DB_PASSWORD);
        $conn->exec(file_get_contents("./sql/database.sql"));

        if ($conn)
        {
            $conn = db_conn($DB_DSN, $DB_USER, $DB_PASSWORD);
            //$conn->exec(file_get_contents("./sql/temp_users.sql"));
            //echo "Table 'temp_users' created successfully.<br>";
            $conn->exec(file_get_contents("./sql/users.sql"));
            echo "Table 'users' created successfully.<br>";
            $conn->exec(file_get_contents("./sql/like.sql"));
            echo "Table 'likes' created successfully.<br>";
            $conn->exec(file_get_contents("./sql/comments.sql"));
            echo "Table 'comments' created successfully.<br>";
            $conn->exec(file_get_contents("./sql/images.sql"));
            echo "Table 'images' created successfully.<br>";
        }
    }
    catch (PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    
}

?>