    <!-- Content Header (Page header) -->
    <section class="content-header">
            <h1>
                Stok Opname
            </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url('barang')?>">Barang</a></li>
            <li class="active"><a href="<?php echo base_url('stok_opname')?>">Stok Opname</a></li>
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
                                    <a href="<?php echo base_url('stok_opname/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> Create Stok Opname</a>
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
                                    <th>Kode Stok Opname</th>
                                    <th>Tanggal Stok Opname</th>
                                    <th>Total Barang</th>
                                    <th>Last User</th>
                                    <th>Status</th>
                                    <th style="text-align:center; width:80px;"  class="action">Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value) {
                                    switch ($value->status) {
                                        case 0:
                                            $status = 'Pending';
                                            break;
                                        
                                        case 1:
                                            $status = 'Completed';
                                            break;
                                        
                                        default:
                                            $status = 'Pending';
                                            break;
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $value->kd_opname; ?></td>
                                        <td><?php echo date('Y-m-d H:i:s', $value->tgl_opname); ?></td>
                                        <td><?php echo $value->total; ?></td>
                                        <td><?php echo $value->nama_user; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td style="text-align:center;">
                                            <div class="btn-group">
                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                                                    Action
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <?php
                                                    if ($value->status == 0) {
                                                       ?>
                                                    <li>
                                                        <a href="<?php echo base_url('stok_opname/proses/'.$value->kd_opname);?>">Sesuaikan</a>
                                                    </li>
                                                       <?php
                                                    }
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo base_url('stok_opname/detail/'.$value->kd_opname);?>">Detail</a>
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
                                    <th>Kode Stok Opname</th>
                                    <th>Tanggal Stok Opname</th>
                                    <th>Total Barang</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th style="text-align:center; width:80px;"  class="action">Action</th> 
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
        "order": [[ 4, "desc" ], [ 1, "desc" ]]
   });    
</script>