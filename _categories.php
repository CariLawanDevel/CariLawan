<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    <?php

                    $cat=mysql_query("SELECT * FROM tb_kategori");

                    while($c=mysql_fetch_array($cat)){
                        $id_kategori = $c['id_kategori'];
                        $kategori = $c['nama_kategori'];
                    ?>
                    <li><a href="event.php?id_kategori=<?php echo $id_kategori;?>"><?php echo $kategori;?></a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
</div>