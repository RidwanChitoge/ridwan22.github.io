<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<nav id="sidebar">
    <div class="p-4 pt-5">
        <a href="<?= site_url(); ?>" class="img logo rounded-circle mb-3" style="background-image: url(<?= base_url('assets/img/loh.png'); ?>);"></a>
        <ul class="list-unstyled components mb-5">

            <li <?= (strtolower($this->uri->segment(1)) == 'dashboard') ? 'class="active"' : ''; ?>>
                <a href="<?= site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> HOME</a>
            </li>
            <?php
            //tampilkan menu di bawah ini jika yang login admin
            if ($this->session->userdata('level') == 'admin') :
            ?>
                <li <?= (in_array(strtolower($this->uri->segment(1)), ['barang', 'tambah_barang', 'edit_barang'])) ? 'class="active"' : ''; ?>>
                    <a href="<?= site_url('barang'); ?>"><i class="fa fa-cubes"></i> INPUT ITEM</a>
                </li>

                <li <?= (in_array(strtolower($this->uri->segment(1)), ['barang', 'tambah_barang', 'edit_barang'])) ? 'class="active"' : ''; ?>>
                    <a href="<?= site_url('barang'); ?>"><i class="fa fa-bookmark"></i> EDIT</a>
                </li>

                <li <?= (in_array(strtolower($this->uri->segment(1)), ['supplier', 'tambah_supplier', 'edit_supplier'])) ? 'class="active"' : ''; ?>>
                    <a href="<?= site_url('supplier'); ?>">
                        <i class="fa fa-truck"></i> Data Barang Masuk
                    </a>
                </li>
            <?php
            endif;
            ?>

            <?php
            //tampilkan menu di bawah ini jika yang login pegawai
            if ($this->session->userdata('level') == 'pegawai') :
            ?>
                <li <?= (in_array(strtolower($this->uri->segment(1)), ['stok_barang'])) ? 'class="active"' : ''; ?>>
                    <a href="<?= site_url('stok_barang'); ?>"><i class="fa fa-cubes"></i> Data Stok Barang</a>
                </li>
            <?php
            endif;
            ?>

            <li <?= (in_array(strtolower($this->uri->segment(1)), ['data_pembelian', 'tambah_pembelian', 'edit_pembelian'])) ? 'class="active"' : ''; ?>>
                <a href="<?= site_url('data_pembelian'); ?>"><i class="fa fa-share"></i> Barang Masuk</a>
            </li>

            <li <?= (in_array(strtolower($this->uri->segment(1)), ['data_penjualan', 'tambah_penjualan', 'edit_penjualan'])) ? 'class="active"' : ''; ?>>
                <a href="<?= site_url('data_penjualan'); ?>"><i class="fa fa-reply"></i> Barang Keluar</a>
            </li>

            <li <?= (in_array(strtolower($this->uri->segment(1)), ['stok_harian', 'stok_bulanan', 'stok_tahunan'])) ? 'class="active"' : ''; ?>>
                <a href="#pageStokBarang" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-file-text-o"></i> Cetak Selisih
                </a>

                <ul class="collapse list-unstyled" id="pageStokBarang">
                    <li <?= (strtolower($this->uri->segment(1)) == 'stok_harian') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('stok_harian'); ?>">
                            <i class="fa fa-angle-double-right"></i> All
                        </a>
                    </li>
                   
                    <li <?= (strtolower($this->uri->segment(1)) == 'stok_tahunan') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('stok_tahunan'); ?>">
                            <i class="fa fa-angle-double-right"></i> Per Item
                        </a>
                    </li>
                </ul>
            </li>

            <li <?= (in_array(strtolower($this->uri->segment(1)), ['pembelian_harian', 'pembelian_bulanan', 'pembelian_tahunan'])) ? 'class="active"' : ''; ?>>
                <a href="#pagePembelian" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-file-text-o"></i> Fixed
                </a>

                <ul class="collapse list-unstyled" id="pagePembelian">
                <a class="nav-link" href="bas.php">
                            <i class="fa fa-angle-double-right"></i> Adjust
                        </a>
                    </li>
                </ul>
            </li>


        <div class="footer">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Ridwan Chitoge &copy;<script>
                    document.write(new Date().getFullYear());
                </script> Chitoge Team <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://chitoge.com" target="_blank">Colorlib.com</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>

    </div>
</nav>