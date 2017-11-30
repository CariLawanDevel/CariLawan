<?php
session_start();

include "_config.php";

$id_member = $_SESSION['id_member'];

$tampil=mysql_query("SELECT * FROM tb_user where id_member='$id_member'");
$baris=mysql_fetch_array($tampil);

$password=$baris['password'];

if(isset($_POST['edit'])) {
    $password_lama=$_POST['password_lama'];
    $password_baru=$_POST['password_baru'];
    if($password==$password_lama){
        $hasil=mysql_query("UPDATE tb_user SET password='$password_baru' WHERE id_member='$id_member'");
        if($hasil){
            echo "<script>alert('Password berhasil diubah.')</script>";
        }
    }
    else{
        echo "<script>alert('Password tidak berhasil diubah, password lama salah !')</script>"; 
    }
}

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

    <div class="container mb-4 mt-4" style="height: 100%;">
        <h1 class="mt-4 mb-3">New Event</h1>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3 class="my-3">Ubah Password</h3>
                <hr/>
                <form id="contactForm" action="" method="post" enctype="multipart/form-data" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password Lama : </label>
                            <input name="password_lama" type="password" class="form-control" id="password_lama" required data-validation-required-message="Please enter your old password." value="">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password Baru : </label>
                            <input name="password_baru" type="password" class="form-control" id="password_baru" required data-validation-required-message="Please enter your new password." value="">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div id="success"></div>
                    <button name="edit" type="submit" class="btn btn-primary" id="edit">Ubah Profil</button>
                </form>
            </div>
        </div>
    </div>

    <?php include '_footer.php'; ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="js/custom.js"></script>

</body>
</html>