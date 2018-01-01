<?php
session_start();

include "../_config.php";

if(!isset($_SESSION['level'])){
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Management Website Cari Lawan</title>

    <link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">

    <link href="../css/buttons.css" rel="stylesheet">
</head>
<body>
    <?php include '_header.php'; ?>

    <header class="business-header mb-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="margin-top: 70px;">
                    <h1 class="display-4 text-center mt-4">Selamat Datang di Cari Lawan</h1>
                    <p class="lead text-center">Ajak teman-teman mu untuk bergabung, temukan teman baru dan lawan baru dalam berolahraga, serta nikmati keseruannya.</p>
                </div>
            </div>
        </div>
    </header>

    <?php include '../_footer.php'; ?>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="../js/custom.js"></script>

</body>
</html>