        <?php
            // error_reporting(0);
            // error_reporting(E_ALL);
            // ini_set('display_errors', TRUE);
            // ini_set('display_startup_errors', TRUE);
            header("Content-Type:text/html; charset=utf-8");
            session_start();
            if ($_COOKIE["auth"] != "admin_in") {header("location:"."./");}
            include("connect.php");
            include("data.php");
            $page = isset($page) ? $page : 1;
        ?>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Kanakku provides clean Admin Templates for managing Sales, Payment, Invoice, Accounts and Expenses in HTML, Bootstrap 5, ReactJs, Angular, VueJs and Laravel.">
        <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@dreamstechnologies">
        <meta name="twitter:title" content="Finance & Accounting Admin Website Templates | Kanakku">
        <meta name="twitter:description" content="Kanakku is a Sales, Invoices & Accounts Admin template for Accountant or Companies/Offices with various features for all your needs. Try Demo and Buy Now.">
        <meta name="twitter:image" content="https://kanakku.dreamstechnologies.com/assets/img/kanakku.jpg">
        <meta name="twitter:image:alt" content="Kanakku">  

        <!-- Facebook -->
        <meta property="og:url" content="https://kanakku.dreamstechnologies.com/">
        <meta property="og:title" content="Finance & Accounting Admin Website Templates | Kanakku">
        <meta property="og:description" content="Kanakku is a Sales, Invoices & Accounts Admin template for Accountant or Companies/Offices with various features for all your needs. Try Demo and Buy Now.">
        <meta property="og:image" content="https://kanakku.dreamstechnologies.com/assets/img/kanakku.jpg">
        <meta property="og:image:secure_url" content="https://kanakku.dreamstechnologies.com/assets/img/kanakku.jpg">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200" >
        <meta property="og:image:height" content="600" >
		<title>柚子履歷管理後台</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="./assets/set-img/logo-yozu.png">
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        
        <!-- Font family -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="./assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="./assets/plugins/fontawesome/css/all.min.css">

		<!-- Feather CSS -->
		<link rel="stylesheet" href="./assets/plugins/feather/feather.css">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="./assets/plugins/select2/css/select2.min.css">

		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="./assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="./assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="./assets/css/style.css">
        <!-- 自定義css請在這裡修改  -->
        <link rel="stylesheet" href="./assets/css/main.css">
        
      
		<!-- Layout Js -->
		<script src="./assets/js/layout.js"></script>