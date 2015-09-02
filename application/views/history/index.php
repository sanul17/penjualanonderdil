    <!-- Content Header (Page header) -->
    <section class="content-header">
            <h1>
                Report
            </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('report')?>">Laporan</a></li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body table-responsive">
<div class="box-button">
    <div class="row">
        <div class="col-md-12">
            <h4>Laporan Barang Masuk</h4>
        </div>
    </div>
    <div class="cleaner_h3"></div>
</div>
                        <div class="cleaner_h3"></div>
                       
                           <table class="dataTableReport table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal</th>
                                    <th>Barang Masuk</th>
                                    <th>Barang Keluar</th>
                                    <th>Type</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value) {
                                    switch ($value->type_history) {
                                        case 1:
                                            $type = 'Pembelian';
                                            break;
                                        
                                        case 2:
                                            $type = 'Penjualan';
                                            break;
                                        
                                        case 3:
                                            $type = 'Return Pembelian';
                                            break;
                                        
                                        case 4:
                                            $type = 'Return Penjualan';
                                            break;
                                        
                                        case 5:
                                            $type = 'Add Stock';
                                            break;

                                        case 6:
                                            $type = 'Update Barang';
                                            break;
                                        
                                        default:
                                            $type = ' - ' ;
                                            break;
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $value->kd_barang; ?></td>
                                        <td><?php echo $value->nama_barang; ?></td>
                                        <td><?php echo gmdate('Y-m-d H:i:s', $value->tgl_history); ?></td>
                                        <td><?php echo $value->qty_masuk; ?></td>
                                        <td><?php echo $value->qty_keluar; ?></td>
                                        <td><?php echo $type; ?></td>
                                        <td><?php echo $value->nama_user; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal</th>
                                    <th>Barang Masuk</th>
                                    <th>Barang Keluar</th>
                                    <th>Type</th>
                                    <th>User</th>
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
    
    $(".dataTableReport").DataTable({
        "order": [[ 2, "desc" ]],
        responsive: true});

</script>