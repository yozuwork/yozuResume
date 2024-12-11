<?php
    error_reporting(0);
    session_start();
    if ($_COOKIE['auth'] == "admin_in"){header("location:"."home.php");}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mass Admin Panel">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>柚子履歷後台</title>
    <style>
        body {
            background: linear-gradient(135deg, #f3ec78, #af4261);
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.75);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }

        .login-container h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 5px;
            color: #fff;
        }

        .form-control:focus {
            box-shadow: none;
            border: 1px solid #af4261;
        }

        .btn-primary {
            background: #af4261;
            border: none;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: #f3ec78;
            color: #af4261;
        }

        .btn-block {
            width: 100%;
        }

        .text-muted {
            color: #ddd !important;
            text-align: center;
            margin-top: 10px;
        }

        .text-muted a {
            color: #f3ec78;
            text-decoration: none;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>柚子履歷後台</h1>
        <form action="/admin/login.php" method="post" name="login">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-lg btn-primary w-100" type="submit">登入</button>
            </div>
        </form>
        <p class="text-muted">沒有帳號？<a href="#">聯繫管理員</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
