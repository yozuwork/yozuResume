<?php
    $db_host        = 'localhost';
    $db_user        = 'root';
    $db_pass        = '1234567';
    $db_database    = 'xuan_demo'; 
    $db_port        = '3306';
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_database, $db_port);
    mysqli_select_db($conn, "xuan_tong");
    mysqli_query($conn, "SET CHARACTER SET utf8mb4");
?>


