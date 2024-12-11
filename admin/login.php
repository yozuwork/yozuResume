
<?php
    include("includes/connect.php");
    $admin_username = mysqli_real_escape_string($conn, $_POST['username']);
    $admin_pass = md5($_POST['password']); 
    $auth = 'admin_in';
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$admin_username."' AND password = '".$admin_pass."'");
    if (mysqli_num_rows($query) <= 0) {
        
        header("location:"."index.php");
    } else {
        $row = mysqli_fetch_array($query);
        setcookie("admin_id", $row["id"]);
        setcookie("admin_pass", $admin_pass);
        setcookie("auth", $auth);
        header("location:"."home.php");
    }
?>
