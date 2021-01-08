<div class="keranjang-body">
    <h2>Keranjang Belanja</h2>
    <table class="table keranjang">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Ukuran</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                foreach($data as $result):
            ?>
            <tr>
                <form action="<?php echo base_url('controller/deleteKeranjang');?>" method="post">
                    <td><?= $i; ?></td>
                    <td><?=$result['nama_produk'];?></td>
                    <td><?=$result['jumlah'];?></td>
                    <td><?=$result['nama_ukuran'];?></td>
                    <td>Rp<?=$result['total'];?>,00</td>
                    <input type="text" name="id_keranjang" hidden="hidden" value="<?=$result['id_keranjang'];?>">
                    <td><button class="hapus" type="submit" name="button">Hapus</button></td>
                </form>
            </tr>
                <?php
                    $i++;
                    endforeach;
                ?>

            <tr>
            <form action="<?php echo base_url('controller/pembelian');?>" method="post">
                <?php
                    foreach($t as $result):
                ?>
                <td colspan="4">Total Harga</td>
                <td colspan="2"> 
                    : Rp<input type="text" name="total" value="<?=$result['sum'];?>">,00
                </td>
                <?php
                    endforeach;
                ?>
            </tr>
            <tr>
                <td colspan="6" align="center"><button class="beli" type="submit" name="button">Bayar Sekarang</button></td>
                </form>
            </tr>
        </tbody>
    </table>
</div>