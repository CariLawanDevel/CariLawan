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
</head>
<body>
    <?php include '_header.php'; 

    include '../_config.php';

    ?>
    
    <?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else if (isset($_GET['tambah'])) {
        $tambah = @$_GET['tambah'];
    }
    if (@$page=='kategori') {        
        include '_kategori.php';
    }
    else if(@$page=='member'){
        include '_member.php';
    }
    else if(@$page=='event'){
        include '_event.php';
    }
    else if(@$tambah=='tambah-kategori'){
        include '_tambahkategori.php';
    }
    else if(@$tambah=='tambah-member'){
        include '_tambahmember.php';
    }
    else if(@$tambah=='tambah-event'){
        include '_tambahevent.php';
    }
    ?>

    <?php include '../_footer.php'; ?>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="../js/custom.js"></script>

</body>
</html>