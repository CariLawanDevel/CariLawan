<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Website Cari Lawan</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header text-center">Login Admin Cari Lawan</div>
            <div class="card-body">
                <form action="login.php?login_attempt=1" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input class="form-control" id="username" name="username" type="text" aria-describedby="emailHelp" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Ingat Password
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block mb-3">Masuk</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    session_start();
    include('../_config.php');

    $username=@$_POST['username'];
    $password=@$_POST['password'];

    if(isset($_GET['login_attempt'])){
        $cek = mysql_query("SELECT * FROM tb_admin WHERE username='$username' AND password='$password'") or die(mysql_error());
        if(mysql_num_rows($cek)==1){ //jika berhasil akan bernilai 1
            $c = mysql_fetch_array($cek);
            $_SESSION['level']=$c['level'];
            echo $_SESSION['level'];

            header("location:index.php");
        }
        else{
            echo "<script>alert('Username dan Password yang anda masukan belum benar, silahkan login kembali')</script>";
        }
    }
    ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>