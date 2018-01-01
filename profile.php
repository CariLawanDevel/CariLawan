<?php
session_start();

include "_config.php";

$id_member = $_SESSION['id_member'];

$tampil=mysql_query("SELECT * FROM tb_member where id_member='$id_member'");
$baris=mysql_fetch_array($tampil);

$id_member=$baris['id_member'];
$nama_member=$baris['nama_member'];
$jenis_kelamin=$baris['jenis_kelamin'];
$alamat=$baris['alamat'];
$no_hp=$baris['no_hp'];
$email=$baris['email'];
$hobi=$baris['hobi'];
$bio=$baris['bio'];
$foto=$baris['foto'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Website Cari Lawan</title>

    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container mt-4 mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="profile.php">Profile</a>
            </li>
        </ol>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <img class="img-fluid" style="width: 30%;" src="images/foto/<?php echo $foto;?>" alt="">
                <h3 class="my-3 text-center"><?php echo $nama_member;?></h3>
                <h6 class="my-3 text-center"><i><?php echo $hobi;?></i></h6>
                <blockquote class="blockquote text-center">
                    <footer class="blockquote-footer"><?php echo $bio;?></p>
                </blockquote>
                <h3 class="my-3">Detail Profil</h3>
                <p>
                    <?php
                    if($jenis_kelamin=="L"){
                        $jenis_kelamin="Laki-laki";
                    }
                    else if($jenis_kelamin=="P"){
                        $jenis_kelamin="Perempuan";
                    }
                    echo $jenis_kelamin;?><br/>
                <?php echo $no_hp;?><br/>
                <?php echo $email;?><br/>
                <?php echo $alamat;?><br/></p>
                <a href="ubah_profil.php" class="btn btn-primary mt-2">Ubah Profil</a>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <?php include '_footer.php'; ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="js/custom.js"></script>

</body>
</html>