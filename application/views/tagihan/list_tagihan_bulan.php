    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tagihan
            <small>List Tagihan per Bulan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Tagihan</a></li>
            <li class="active"><a href="<?php echo base_url('tagihan')?>">List Tagihan per Bulan</a></li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-button">
                            <p class="lead">Kode Sales: <?php echo $kd_sales; ?></p>
                            <p class="lead">Nama Sales: <?php echo $nama_sales; ?></p>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width:200px !important;">Bulan</th>
                                    <th style="width:200px !important;">Total Tagihan</th>
                                    <th style="width:200px !important;">Total Retur</th>
                                    <th style="width:200px !important;">Total Pembayaran</th>
                                    <th style="width:200px !important;">Sisa Tagihan</th>
                                    <th style="width:150px !important;">Status</th>
                                    <th class=="action" style="width:150px; text-align:center; !important;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value) {
                                    ?>
                                    <?php
                                    if ($this->session->userdata['level'] == 'sales' && $value->total_tagihan-$value->total_retur <= $value->total_pembayaran_tagihan) {
                                        continue;
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $value->bulan; ?></td>
                                        <td><?php echo number_format($value->total_tagihan, 2, ",", "."); ?></td>
                                        <td><?php echo number_format($value->total_retur, 2, ",", "."); ?></td>
                                        <td><?php echo number_format($value->total_pembayaran_tagihan, 2, ",", "."); ?></td>
                                        <td><?php echo number_format($value->total_tagihan-$value->total_retur-$value->total_pembayaran_tagihan, 2, ",", "."); ?></td>
                                        <td><?php if ($value->total_tagihan-$value->total_retur > $value->total_pembayaran_tagihan) {
                                            echo "Belum Lunas";
                                        }else{
                                            echo "Lunas";
                                        }
                                        ?></td>
                                        <?php
                                        if ($this->session->userdata['level'] == 4) {
                                            ?>
                                            <td style="text-align:center;">
                                                <a class="btn btn-default" <?php if ($value->total_tagihan-$value->total_retur <= $value->total_pembayaran_tagihan) {
                                                    echo "disabled";
                                                } ?> href="<?php echo base_url('tagihan/bayar_tagihan/'.$value->kd_bulan.'_'.$value->kd_tahun);?>">Bayar Tagihan</a>
                                            </td>
                                            <?php
                                        }elseif ($this->session->userdata['level'] == 1) {
                                            ?>

                                        <td style="text-align:center;">
                                            <div class="btn-group">
                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                                                    Action
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo base_url('tagihan/update/'.$value->kd_bulan.'_'.$value->kd_tahun);?>">Process</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('tagihan/detail/'.$value->kd_bulan.'_'.$value->kd_tahun);?>">Detail</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <?php

                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:200px !important;">Bulan</th>
                                    <th style="width:200px !important;">Total Tagihan</th>
                                    <th style="width:200px !important;">Total Retur</th>
                                    <th style="width:200px !important;">Total Pembayaran</th>
                                    <th style="width:200px !important;">Sisa Tagihan</th>
                                    <th style="width:100px !important;">Status</th>      <?php
                                        if ($this->session->userdata['level'] == 'sales') {
                                            ?>
                                    <th clas=="action" style="width:150px; text-align:center; !important;">Action</th>
                                    <?php
                                }
                                ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->



<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>"></script>
<script type="text/javascript" src="//cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.js"></script>
<script type="text/javascript">

$("#dataTable").DataTable({

    "order": [[ 0, "desc" ]]
}); 
</script>