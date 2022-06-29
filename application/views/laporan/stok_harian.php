<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-file-text"></i> CETAK SELISIH</h4>
    </div>
</div>
<hr class="mt-0" />
<?php
if ($this->session->flashdata('alert')) {
    echo '<div class="alert alert-danger" role="alert">
    ' . $this->session->flashdata('alert') . '
  </div>';
}
?>
<div class="row">
    <div class="col-md-10 col-sm-12">
        <?= form_open('', ['class' => "form-inline"]); ?>
        <div class="form-group mx-sm-3 mb-2">
            <label for="date-picker" class="sr-only">Tanggal</label>
            <input type="text" name="tanggal" class="form-control form-control-sm" id="date-picker" placeholder="dd/mm/yyyy" value="<?= $tanggal; ?>">
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-sm" name="cari" value="Search">
            Cari Data
        </button>
        <?= form_close(); ?>
    </div>
    <div class="col-md-2 col-sm-12">
        <a href="<?= site_url('stok_harian/' . date('Y-m-d', strtotime(str_replace('/', '-', $tanggal)))); ?>" class="btn btn-success btn-block btn-sm" target="_blank">
            <i class="fa fa-print"></i> Cetak
        </a>
    </div>
</div>
<table class="table table-bordered border-primary">
    <thead class="thead-dark">
        <tr class="table-primary">
           
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            
            <th scope="col" class="text-center">Stok Barang Fisik</th>
            <th scope="col" class="text-center">Selisih</th>
            <th scope="col" class="text-center">Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $dt) {
                $penjualan = ($dt->qty_penjualan_new != '') ? $dt->qty_penjualan_new : 0;
                $pembelian = ($dt->qty_pembelian_new != '') ? $dt->qty_pembelian_new : 0;

                echo '<tr>';

                echo '<td>' . $dt->kode_barang . '</td>';
                echo '<td>' . $dt->nama_barang . '</td>';
                
                echo '<td class="text-center">' . (($dt->stok + $penjualan) + $pembelian) . '</td>';
                echo '<td class="text-center">' . (($dt->qty_penjualan != '') ? $dt->qty_penjualan : 0) . '</td>';
                echo '<td class="text-center">' . (($dt->qty_pembelian != '') ? $dt->qty_pembelian : 0) . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="7" class="text-center">Data tidak ditemukan</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>