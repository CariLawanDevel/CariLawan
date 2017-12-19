<?php 

if(isset($_GET['hapus'])) {
    $id_member=$_GET['hapus'];

    $hasil=mysql_query("DELETE FROM tb_join WHERE id_member='$id_member'");
    $hasil=mysql_query("DELETE FROM tb_user WHERE id_member='$id_member'");
    $hasil=mysql_query("DELETE FROM tb_event WHERE id_member='$id_member'");
    $hasil=mysql_query("DELETE FROM tb_member WHERE id_member='$id_member'");
    header("location:manage.php?page=member");
}

?>
<div class="container">

    <h1 class="mt-4 mb-3">Manage Member</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">manage</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $page;?></li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <a class="btn btn-primary" href="manage.php?tambah=tambah-member"> Tambah Data </a>
                <br><br>
                <div class="table-responsive text-center">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">Nama</th>
                                <th width="5%">JK</th>
                                <th width="10%">Alamat</th>
                                <th width="5%">No. HP</th>
                                <th width="8%">Email</th>
                                <th width="8%">Hobi</th>
                                <th width="8%">Bio</th>
                                <th width="8%">Username</th>
                                <th width="25%">&nbsp;Action&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql=mysql_query("SELECT * FROM tb_member, tb_user WHERE tb_member.id_member=tb_user.id_member ORDER BY tb_member.id_member");
                            while($data=mysql_fetch_array($sql)){
                                $id_member=$data['id_member'];
                                $nama_member=$data['nama_member'];
                                $jenis_kelamin=$data['jenis_kelamin'];
                                $alamat=$data['alamat'];
                                $no_hp=$data['no_hp'];
                                $email = $data['email'];
                                $hobi=$data['hobi'];
                                $bio=$data['bio'];
                                $username=$data['username'];
                            ?>
                            <tr>
                                <td><?php echo $id_member ?></td>
                                <td><?php echo $nama_member ?></td>
                                <td><?php echo $jenis_kelamin ?></td>
                                <td><?php echo $alamat ?></td>
                                <td><?php echo $no_hp ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $hobi ?></td>
                                <td><?php echo $bio ?></td>
                                <td><?php echo $username ?></td>
                                <td>
                                    <a class="btn btn-primary" href="manage.php?tambah=tambah-member&id_member=<?php echo $id_member;?>">
                                        <i class="glyphicon glyphicon-pencil"></i>Ubah
                                    </a>
                                    <a class="btn btn-danger" href="manage.php?page=member&hapus=<?php echo $id_member;?>">
                                        <i class="glyphicon glyphicon-remove"></i>Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>