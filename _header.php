<?php
    include('_config.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="index.php">Cari Lawan</a>
    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    	</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-link"><a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a></li>
				<li class="nav-link"><a class="nav-link" href="event.php">Event</a></li>
				<li class="nav-link"><a class="nav-link" href="#">About</a></li>
				<?php
				if(@$_SESSION['level']=="member"){
					$id_member=$_SESSION['id_member'];

					$nama=mysql_query("SELECT nama_member FROM tb_member WHERE id_member=$id_member");
					$c=mysql_fetch_array($nama);

					$nama_member=$c['nama_member'];

				?>
					<li class="nav-link dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, <b><?php echo $nama_member; ?></b></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
							<a class="dropdown-item" href="dashboard.php">Dashboard</a>
	                        <a class="dropdown-item" href="profile.php">Profil Saya</a>
							<a class="dropdown-item" href="ubah_password.php">Ubah Password</a>
	                        <a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>
				<?php
				}
				else{
				?>
					<li class="nav-link dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
		                    <a class="dropdown-item" href="login.php">Login</a>
						</div>
					</li>
				<?php } ?>
				
			</ul>
		</div>
	</div>
</nav>