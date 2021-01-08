<div class="bayar">
    <form action="prosesBayar" method="POST">
        <div class="form-group">
            <input type="text" name="id_pelanggan" hidden="hidden" value="<?=$id_pelanggan?>"><br>
            <input type="text" name="date" hidden="hidden" value="<?=$date?>">
            <input type="text" name="total" hidden="hidden" value="<?=$total?>">
            <label>Konfirmasi Pembelian?</label>
        </div>
        <button type="submit" name="button">Konfirmasi</button>
    </form>
</div>