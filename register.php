<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Website Cari Lawan</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header text-center">Daftar Member Cari Lawan</div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="nama">Nama Depan</label>
                                <input class="form-control" id="namaDepan" type="text" aria-describedby="nameHelp" placeholder="Masukkan Nama Depan">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputLastName">Nama Belakang</label>
                                <input class="form-control" id="namaBelakang" type="text" aria-describedby="nameHelp" placeholder="Masukkan Nama Belakang">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" type="text" aria-describedby="nameHelp" placeholder="Masukkan Email">
                            </div>
                            <div class="col-md-6">
                                <label for="noHp">No. HP</label>
                                <input class="form-control" id="noHp" type="text" aria-describedby="nameHelp" placeholder="Masukkan Nomor HP">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="jenisKelamin">Jenis kelamin</label>
                                
                            </div>
                            <div class="col-md-6">
                                <label for="hobi">Hobi</label>
                                <input class="form-control" id="hobi" type="text" aria-describedby="nameHelp" placeholder="Masukkan Hobi">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" type="text" aria-describedby="emailHelp" placeholder="Masukkan Alamat" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea class="form-control" id="bio" type="text" aria-describedby="emailHelp" placeholder="Masukkan Bio" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" id="username" type="text" aria-describedby="emailHelp" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Password</label>
                                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleConfirmPassword">Confirm password</label>
                                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary btn-block" href="login.php">Register</a>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="login.php">Sudah punya akun ? Login di sini</a>
                    <a class="d-block small" href="forgot-password.php">Lupa Password</a>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>