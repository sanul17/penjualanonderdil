            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Home
                    <small>Petunjuk</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php

                if ($this->session->userdata('level') == 'owner' || $this->session->userdata('level') == 'admin') {
                    ?>
                    <p class="lead">Selamat Datang di Sistem Penjualan Pasti Jaya Motor</p>
                    <ul>
                        <li><h5>Home -> Petunjuk Sistem Penjualan</h5></li>
                        <li><h5>Stok Barang -> Manajemen Master Barang</h5></li>
                        <li><h5>Sales -> Manajemen Sales Pasti Jaya Motor</h5></li>
                        <li><h5>Transaksi </h5></li>
                        <ul>
                            <li>Orderan -> Manajemen Orderan dari Sales, Confirmasi</li>
                            <li>Penjualan -> Penjualan Cash, dan Cetak Faktur Penjualan Akhir Orderan dan Cash</li>
                        </ul>
                        <li><h5>Users -> Manajemen User (Owner, Admin, Gudang)</h5></li>
                        <li><h5>Laporan -> Laporan Penjualan Sales Perbulan</h5></li>
                    </ul>

                    <p class="lead">Notification</p>
                    <ul>
                        <li><h5>Stok Barang -> Barang kurang dari Stok Minimum</h5></li>
                        <li><h5>Orderan -> Orderan yang belum dikonfirmasi</h5></li>
                    </ul>
                    <?php
                }else if ($this->session->userdata('level') == 'sales') {
                    ?>
                    <p class="lead">Selamat Datang di Sistem Penjualan Pasti Jaya Motor</p>
                    <ul>
                        <li><h5>Home -> Petunjuk Sistem Penjualan</h5></li>
                        <li><h5>List Barang -> List Barang</h5></li>
                        <li><h5>Orderan -> New Orderan, Update Detail dan Delete Orderan</h5></li>
                    </ul>
                    <?php 
                }else{
                    ?>
                    <p class="lead">Selamat Datang di Sistem Penjualan Pasti Jaya Motor</p>
                    <ul>
                        <li><h5>Home -> Petunjuk Sistem Penjualan</h5></li>
                        <li><h5>Stok Barang -> List Barang dan Lokasi barang</h5></li>
                    </ul>
                    ><?php
                }
                ?>
            </section><!-- /.content -->