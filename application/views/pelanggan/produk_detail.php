<div class="produk_detail">  
    <h2>Detail Produk</h2>  
    <?php
        foreach($data as $result):
    ?>
        <div class="image">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($result['gambar']); ?>" width="250px"/>
        </div>
        <div class="desc">
            <h3><?php echo $result['nama_produk']; ?></h3> 
            <table>
                <tr>
                    <td>Harga</td>
                    <td>: Rp<?php echo $result['harga_produk']; ?>,00</td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>: <?php echo $result['deskripsi']; ?></td>
                </tr>
                <tr>
                    <form class="" action="keranjang" method="post">
                        <td>Ukuran</td>
                        <td>:
                        <?php
                            foreach($ukuran as $r):
                        ?>                   
                            <input type="radio" id="<?php echo $r['id_ukuran']; ?>" name="ukuran" value="<?php echo $r['id_ukuran']; ?>">
                            <label for="<?php echo $r['id_ukuran']; ?>"><?php echo $r['nama_ukuran']; ?></label>
                        <?php
                            endforeach;
                        ?>
                        </td>
                </tr> 
                <tr>       
                        <td>Jumlah</td>
                        <td>: <input type="number" name="jumlah"></td>
                </tr>    
                <tr>
                    <input type="text" hidden="hidden" name="username" value="<?=$this->session->userdata('id')?>">
                    <input type="text" hidden="hidden" name="id" value="<?php echo $result['id_produk']; ?>">
                    <input type="text" hidden="hidden" name="harga" value="<?php echo $result['harga_produk']; ?>">
                    <td colspan="2"><button type="submit" name="button">Beli</button></td>
                </tr>
                    </form>                
            </table>
        </div>
        
    <?php
        endforeach;
    ?>
</div>