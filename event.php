<?php
session_start();

include "_config.php";

$id_member = $_SESSION['id_member'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Website Cari Lawan</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <?php include '_header.php'; ?>

    <?php
    if (isset($_GET['id_event'])) {
        $id_event = $_GET['id_event'];
        include '_detail.php';
    }
    else{
        include '_eventmain.php';
    }
    ?>

    <?php include '_footer.php'; ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="js/custom.js"></script>

</body>
</html>