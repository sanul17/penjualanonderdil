    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'owner') {
            ?>
            <h1>
                Master Penjualan
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
                                    <?php if ($this->session->userdata('level') == 'sales') {
                                        ?>
                                        <a href="<?php echo base_url('penjualan/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
                                        <?php
                                    }
                                    ?>
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
                                    <th>Kode Penjualan</th>
                                    <th>Kode Order</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Jual</th>
                                    <th>Total Harga</th>
                                    <th>User</th>
                                    <th>Jenis</th>
                                    <th style="text-align:center;"  class="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->kd_penjualan; ?></td>
                                        <td><?php echo $value->kd_penjualan; ?></td>
                                        <td><?php echo $value->nama_pelanggan; ?></td>
                                        <td><?php echo gmdate('d/m/Y - H:i:s', $value->tgl_penjualan); ?></td>
                                        <td><?php echo $value->total_harga; ?></td>
                                        <td><?php echo $value->kd_user; ?></td>
                                        <td><?php echo $value->jenis; ?></td>
                                        <td style="text-align:center;">
                                            <div class="btn-group">
                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                                                    Action
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo base_url('penjualan/confirm/'.$value->kd_penjualan);?>">Print</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('penjualan/detail/'.$value->kd_penjualan);?>">Detail</a>
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
                                    <th>Kode Order</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Jual</th>
                                    <th>Total Harga</th>
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

    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="deleteLabel">Delete</h3>
                </div>
                <div class="modal-body">
                    <h4>penjualan ini akan dihapus, Anda Yakin?</h4>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal" aria-hidden="true" href="javascript:;">Tidak</a>
                    <a class="btn btn-primary" id="deleteModalFunction" href="javascript:;">Ya</a>
                </div>
            </div>
        </div>
    </div>
    <script>
    function deleteModalFunction(temp_id){
        $("#deleteModalFunction").attr("href","<?php echo base_url();?>penjualan/delete/"+temp_id);
    }
    </script>