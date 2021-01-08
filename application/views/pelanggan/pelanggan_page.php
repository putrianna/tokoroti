<div class="info-beli">
<h2>Histori Pembelian</h2>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Id Beli</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($data as $result):
                ?>
                <tr>
                        <td><?= $i; ?></td>
                        <td><?=$result['tanggal'];?></td>
                        <td><?=$result['id_beli'];?></td>
                        <td><?=$result['total'];?></td>
                    </form>
                </tr>
                <?php
                    $i++;
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>