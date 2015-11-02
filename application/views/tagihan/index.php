    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tagihan
            <small>List Sales</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Tagihan</a></li>
            <li class="active"><a href="<?php echo base_url('tagihan')?>">List Sales</a></li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-button">

                        </div>
                    </div><!-- /.box-header -->
                    <hr>
                    <div class="box-body table-responsive" style="width:600px !important;">
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:100px !important;">Kode sales</th>
                                    <th style="width:400px !important;">Nama sales</th>
                                    <th style="width:100px !important; text-align:center;" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->kd_sales; ?></td>
                                        <td><?php echo $value->nama_sales; ?></td>
                                        <td style="text-align:center;">
                                                <a class="btn btn-default" href="<?php echo base_url('tagihan/list_tagihan_bulan/'.$value->kd_sales);?>">Detail Tagihan</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kode sales</th>
                                    <th>Nama sales</th>
                                    <th style="text-align:center;">Action</th>
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
    
    $("#dataTable").DataTable();    
    </script>