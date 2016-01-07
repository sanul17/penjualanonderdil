    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transaksi Stok Opname
            <small>Detail Stok Opname</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('stok_opname')?>">Stok Opname</a></li>
            <li class="active"><a href="<?php echo base_url('stok_opname/detail/'.$kd_opname)?>">Detail Stok Opname</a></li>
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
                                    <a href="<?php echo base_url('stok_opname');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                    <a href="<?php echo base_url('stok_opname/add/'.$kd_opname)?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> Add More</a>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                    </div><!-- /.box-header -->

                    <hr>
                    <div class="box-body table-responsive">                     
                        <div class="box-button">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Data Supplier</h4>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">

                            <?php
                            if (form_error('kd_opname')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                            <label for="kd_opname" class="col-md-2 control-label">Kode Stok Opname</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control flat" id="kd_opname" name="kd_opname" value='<?php echo $kd_opname; ?>' readonly>
                            </div>
                            <div class="col-md-4"><?php echo form_error('kd_opname'); ?></div>
                        </div>

                        <?php
                        if (form_error('kd_user')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="kd_user" class="col-md-2 control-label pull-left">Last User</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control flat" id="kd_user" name="kd_user" value='<?php echo $kd_user; ?>' readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control flat" id="nama_user" name="nama_user" value="<?php echo $nama_user; ?>" readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('kd_user'); ?></div>
                    </div>
                        <?php
                        if (form_error('tgl_opname')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="tgl_opname" class="col-md-2 control-label pull-left">Tanggal Stok Opname</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control flat" id="tgl_opname" name="tgl_opname" value='<?php echo date('Y-m-d H:i:s', $tgl_opname); ?>' readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('tgl_opname'); ?></div>
                    </div>
                        <?php
                        if (form_error('status')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="status" class="col-md-2 control-label pull-left">Status</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control flat" id="status" name="status" value='<?php echo $status; ?>' readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('status'); ?></div>
                    </div>
        </div>
        <hr>                        
        <div class="box-button">
            <div class="row">
                <div class="col-md-12">
                    <h4>Data Stok Opname</h4>
                </div>
            </div>
            <div class="cleaner_h3"></div>
        </div>
        <div class="box-body table-responsive">
            <div class="cleaner_h3"></div>
            <table  id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Brand</th>
                        <th>Stok Database</th>
                        <th>Stok Fisik</th>
                        <th>Selisih</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data_opname_detail as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $value->kd_barang; ?></td>
                                <td><?php echo $value->nama_barang; ?></td>
                                <td><?php echo $value->brand; ?></td>
                                <td><?php echo $value->stok_komp; ?></td>
                                <td><?php echo $value->stok_fisik; ?></td>
                                <td><?php echo $value->selisih; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Brand</th>
                        <th>Stok Database</th>
                        <th>Stok Fisik</th>
                        <th>Selisih</th>
                    </tfoot>
                </table>
                <div class="cleaner_h20"></div>
                <div class="form-group">
                    <div class="col-sm-8">
                        <?php 
                        /*
                        <a href="<?php echo base_url('stok_opname/update/'.$kd_opname);?>" class="btn btn-default flat"><i class="fa fa-pencil fa-fw"></i> Update</a>
                        <a href="#deleteModal" role="button" data-toggle="modal" onclick="deleteModalFunction('<?php echo $kd_opname; ?>')" class="btn btn-default flat"><i class="fa fa-trash fa-fw"></i> Delete</a>
                        
                    */
                        ?>
                        <a href="<?php echo base_url('stok_opname');?>" class="btn btn-default flat">Close</a>
                    </div>
                </div>
            </form>
            <div class="cleaner_h20"></div>
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
    "order": [[ 0, "asc" ]]
});    

</script>