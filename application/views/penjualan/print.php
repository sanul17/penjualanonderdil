 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>
        Cetak Faktur
        <small><?php echo $kd_penjualan; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Penjualan</a></li>
        <li class="active">Cetak Faktur</li>
    </ol>
</section>

<div class="pad margin no-print">
    <div class="alert alert-info" style="margin-bottom: 0!important;">
        <i class="fa fa-info"></i>
        <b>Note:</b> Cetak Faktur untuk penjualan <?php echo $kd_penjualan; ?>
    </div>
</div>

<!-- Main content -->
<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                Faktur Penjualan 
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
                <strong>Alvindo Motor Jakarta</strong><br>
                Jl. Nirmala Raya No 3H<br>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
                <strong>Kode    : </strong><?php echo $kd_penjualan; ?><br>
                <strong>Tanggal : </strong><?php echo $tgl_cetak; ?><br>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
                <strong>Pelanggan : </strong><?php echo $nama_pelanggan; ?><br>
                <strong>Alamat    : </strong><?php echo $alamat; ?><br>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <br>
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width:120px;">Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="width:100px;">Quantity</th>
                        <th style="width:150px;">Harga</th>
                        <th style="width:80px;">Dus</th>
                        <th style="width:150px;">Sub Total</th></tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data_penjualan_detail as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $value->kd_barang; ?></td>
                                <td><?php echo $value->nama_barang; ?></td>
                                <td><?php echo $value->qty; ?></td>
                                <td>Rp. <?php echo $value->harga_tersimpan ?></td>
                                <td><?php echo $value->dus; ?></td>
                                <td>Rp. <?php echo $value->qty*$value->harga_tersimpan ?></td>
                            </tr>
                            <?php
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="gradeX">
                            <td colspan="5">Total</td>
                            <td>Rp. <?php echo $total; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                <a href="<?php echo base_url('penjualan');?>" class="btn btn-default flat">Close</a>
            </div>
        </div>
                </section><!-- /.content -->