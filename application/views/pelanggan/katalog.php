<div class="katalog">
    <div>
        <?php
            foreach($data as $result):
        ?>
        <form class="" action="detail_produk" method="post">
            <div class="card">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($result['gambar']); ?>" width="300px"/>
                <h4><?php echo $result['nama_produk']; ?></h4> 
                <p>Rp<?php echo $result['harga_produk']; ?>,00</p>
                <input type="text" hidden="hidden" name="id" value="<?=$result['id_produk'];?>">
                <button type="submit" name="button">Lihat Produk</button>
            </div>
        </form>
        <?php
            endforeach;
        ?>
    </div>
</div>