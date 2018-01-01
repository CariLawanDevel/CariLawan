<?php 

if(isset($_GET['hapus'])) {
    $id_event=$_GET['hapus'];

    $hasil=mysql_query("DELETE FROM tb_chat WHERE id_event='$id_event'");
    $hasil=mysql_query("DELETE FROM tb_join WHERE id_event='$id_event'");
    $hasil=mysql_query("DELETE FROM tb_event WHERE id_event='$id_event'");
    header("location:manage.php?page=event");
}

?>

<div class="container">

    <h1 class="mt-4 mb-3">Manage Event</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">manage</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $page;?></li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <a class="btn btn-primary" href="manage.php?tambah=tambah-event"> Tambah Data </a>
                <br><br>
                <div class="table-responsive text-center">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">Nama</th>
                                <th width="15%">Deskripsi</th>
                                <th width="10%">Tanggal</th>
                                <th width="5%">Waktu</th>
                                <th width="5%">Jumlah</th>
                                <th width="5%">Biaya</th>
                                <th width="10%">Lokasi</th>
                                <th width="5%">Kategori</th>
                                <th width="25%">&nbsp;Action&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql=mysql_query("SELECT *, DATE_FORMAT(tanggal, \"%w %Y %m %d\"), TIME_FORMAT(waktu, \"%H.%i WIB\"), nama_member FROM tb_member, tb_event, tb_kategori WHERE tb_member.id_member=tb_event.pj_event AND tb_kategori.id_kategori=tb_event.id_kategori ORDER BY id_event");
                            while($data=mysql_fetch_array($sql)){
                                $id_event=$data['id_event'];
                                $nama_event=$data['nama_event'];
                                $deskripsi=$data['deskripsi'];

                                //format tanggal
                                $tanggal = $data['DATE_FORMAT(tanggal, "%w %Y %m %d")'];
                                $hari_indo = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
                                $bulan_indo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                $hr = substr($tanggal, 0, 1);
                                $thn = substr($tanggal, 2, 4);
                                $bln = substr($tanggal, 7, 2);
                                $tgl = substr($tanggal, 10, 2);
                                $tanggal_reg = $hari_indo[(int)$hr].", ".$tgl." ".$bulan_indo[(int)$bln-1]." ".$thn;

                                //format waktu
                                $waktu = $data['TIME_FORMAT(waktu, "%H.%i WIB")'];

                                $jumlah_peserta = $data['jumlah_peserta'];
                                $jum=mysql_query("SELECT COUNT(id_join) FROM tb_join WHERE id_event=$id_event");
                                $j=mysql_fetch_array($jum);
                                $jumlah_peserta_join = $j['COUNT(id_join)'];
                                $biaya=$data['biaya'];
                                $lokasi=$data['lokasi'];
                                $nama_pj = $data['nama_member'];
                                $kategori = $data['nama_kategori'];

                            ?>
                            <tr>
                                <td><?php echo $id_event ?></td>
                                <td><?php echo $nama_event ?></td>
                                <td><?php echo $deskripsi ?></td>
                                <td><?php echo $tanggal_reg ?></td>
                                <td><?php echo $waktu ?></td>
                                <td><?php echo $jumlah_peserta_join;?> of <?php echo $jumlah_peserta;?></td>
                                <td><?php echo $biaya ?></td>
                                <td><?php echo $lokasi ?></td>
                                <td><?php echo $kategori; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="manage.php?tambah=tambah-event&id_event=<?php echo $id_event;?>">
                                        <i class="glyphicon glyphicon-pencil"></i>Ubah
                                    </a>
                                    <a class="btn btn-danger" href="manage.php?page=event&hapus=<?php echo $id_event;?>">
                                        <i class="glyphicon glyphicon-remove"></i>Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>