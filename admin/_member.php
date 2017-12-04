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
                            <tr>
                                <td>1</td>
                                <td>Nikko Eka Saputra</td>
                                <td>L</td>
                                <td>Jakarta</td>
                                <td>08988190546</td>
                                <td>nikkoeka04@gmail.com</td>
                                <td>Renang</td>
                                <td>It's better than tommorow</td>
                                <td>Futsal</td>
                                <td>
                                    <a class="btn btn-primary" href="">
                                        <i class="glyphicon glyphicon-pencil"></i>Ubah
                                    </a>
                                    <a class="btn btn-danger" href="">
                                        <i class="glyphicon glyphicon-remove"></i>Hapus
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>