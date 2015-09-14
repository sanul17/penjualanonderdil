 <!-- Content Header (Page header) -->
     <style type="text/css">
        body{
            background-color: #ffffff;
        }
        [class*="span"] {
            float: left;
            min-height: 1px;
            margin-left: 5px;
        }
        .span {
            width: 200px;
        }
        .sign{
            height: 30px;
        }
        .text-center{
            text-align: center
        }
        .lead{
        font-size: 18px;
        font-weight:bold;
        }
        
        h2.page-header{
        	font-size: 18px;
            padding-bottom: 0;
        	}
        	h5{
        	font-size: 14px;
        	}
        
        .invoice{
        	font-size: 14px;
    text-transform: uppercase;
                letter-spacing: 2px;
        	}

            .invoice table td{
                padding: 5px !important;
            }

    </style>

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
            <span class="lead">Alvindo Motor</span class="lead"><br>
            JAKARTA<br>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <strong>No Faktur: </strong><?php echo $kd_penjualan; ?><br>
            <strong>Tanggal  : </strong><?php echo $tgl_cetak; ?><br>
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
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:40px;">No</th>
                        <th>Nama Barang</th>
                        <th style="width:150px;">Harga Satuan</th>
                        <th style="width:100px;">Quantity</th>
                        <th style="width:150px;">Sub Total</th>
                        <th style="width:60px;">Dus</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no_urut = 1;
                        foreach ($data_penjualan_detail as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $no_urut; ?></td>
                                <td><?php echo $value->kategori." ".$value->type; ?></td>
                                <td><?php echo $value->harga_satuan; ?></td>
                                <td><?php echo $value->total_qty; ?></td>
                                <td>Rp. <?php echo number_format($value->total_qty*$value->harga_tersimpan, 2, ",", "."); ?></td>
                                <td><?php echo $value->dus; ?></td>
                            </tr>
                            <?php
                            $no_urut++;
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="gradeX">
                            <td colspan="4">Total</td>
                            <td>Rp. <?php echo number_format($total, 2, ",", "."); ?></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->
<div class="row">
        <div class="span center">
            <h5 class="text-center">Admin</h5>
            <div class="sign"></div>
            <h5 class="text-center"><?php echo $nama_user; ?></h5>
        </div>

        <div class="span center"  style="float: right">
            <h5 class="text-center">Pelanggan</h5>
            <div class="sign"></div>
            <h5 class="text-center"><?php echo $nama_pelanggan?></h5>
        </div>
    </div>


        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <hr>
            <div class="col-xs-12">
                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                <a href="<?php echo base_url('penjualan');?>" class="btn btn-default flat">Close</a>
            </div>
        </div>
                </section><!-- /.content -->