<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <table
      class="table-condensed table-bordered table-striped"
      style="margin-bottom: 18px;">
      <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th></th>
      </tr>
      <?php
      $output = '';
      $no = 0;
      //var_dump($data);
      foreach ($data as $items) {
        $no++; ?>
          <tr>
            <td><?php echo $items['name'] ?></td>
            <td>Rp <?php echo number_format($items['price'],2,',','.') ?></td>
            <td><?php echo $items['qty'] ?></td>
            <td>
              <button
                type="button"
                id="<?php echo $items['rowid'] ?>"
                class="hapus_cart btn btn-danger btn-xs">
                  Batal
                </button>
            </td>
          </tr>
        <?php
      }
      ?>
      <tr>
       <th colspan="3">Total</th>
       <th colspan="2">
         Rp <?php echo number_format($this->cart->total(), 2, ',', '.'); ?>
       </th>
      </tr>
    </table>
    <div class="col-md-4" style="margin-bottom: 16px;">
      <form class="" action="<?php echo base_url('KantinController/buat_pesanan'); ?>" method="post">
        <div class="form-group">
          <label for="kelurahan">Alamat</label>
          <input type="text" name="alamat" value="" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="kelurahan">Kelurahan</label>
          <select class="form-control" name="kelurahan" required>
            <option value="Keputih">Keputih</option>
            <option value="Gebang Putih">Gebang Putih</option>
            <option value="Menur Pumpungan">Menur Pumpungan</option>
            <option value="Nginden Jangkungan">Nginden Jangkungan</option>
            <option value="Semolowaru">Semolowaru</option>
            <option value="Medokan Semampir">Medokan Semampir</option>
            <option value="Klampis Ngasem">Klampis Ngasem</option>
          </select>
        </div>
        <div class="form-group">
          <label for="phone">No.HP</label>
          <input type="text" name="phone" value="" class="form-control" required>
        </div>
        <div class="form-group">
          <button
            class="btn-pesan btn btn-success"
            type="submit"
            name="pesan"
            class="btn btn-lg btn-success">
              Pesan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
