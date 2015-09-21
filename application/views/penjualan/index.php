    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'owner') {
            ?>
            <h1>
                Transaksi Penjualan
                <small>List Penjualan</small>
            </h1>
            <?php
        }else{
            ?>
            <h1>
                List Penjualan
            </h1>
            <?php
        }
        ?>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('penjualan')?>">Penjualan</a></li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-button">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?php echo base_url('penjualan');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                    <a href="<?php echo base_url('penjualan/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> Penjualan Cash</a>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                    </div><!-- /.box-header -->
                    <hr>
                    <div class="box-body table-responsive">
                        <div class="cleaner_h3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php                                
                                if(!empty($this->session->flashdata('pesan'))){
                                    echo '<div class="alert alert-info alert-dismissable"><i class="fa fa-info"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> '.$this->session->flashdata('pesan').'</div>';
                                };
                                ?>
                            </div>
                        </div>
                        <div class="cleaner_h3"></div>
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="100">Kode Penjualan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th width="80">Sales</th>
                                    <th width="150">Tanggal Jual</th>
                                    <th width="80">User</th>
                                    <th width="50">Jenis</th>
                                    <th style="text-align:center; width:80px;"  class="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value) {
                                    $TGL = gmdate('d/m/Y - H:i:s', $value->tgl_penjualan);
                                    ?>
                                    <tr>
                                        <td><?php echo $value->kd_penjualan; ?></td>
                                        <td><?php echo $value->nama_pelanggan; ?></td>
                                        <td><?php echo $value->alamat; ?></td>
                                        <td><?php echo $value->nama_sales; ?></td>
                                        <td><?php echo gmdate('Y-m-d H:i:s', $value->tgl_penjualan); ?></td>
                                        <td><?php echo $value->nama_user; ?></td>
                                        <td><?php echo $value->jenis; ?></td>                                           
                                        <td style="text-align:center;">
                                            <div class="btn-group">
                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                                                    Action
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo base_url('penjualan/cetak/'.$value->kd_penjualan)?>">Cetak</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('penjualan/update/'.$value->kd_penjualan);?>">Update</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kode Penjualan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Sales</th>
                                    <th>Tanggal Jual</th>
                                    <th>User</th>
                                    <th>Jenis</th>
                                    <th style="text-align:center;"  class="action">Action</th>
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
        responsive: true,
        "aoColumnDefs": [
        { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
        ],
        "order": [[ 4, "desc" ]]
    });    
    </script>