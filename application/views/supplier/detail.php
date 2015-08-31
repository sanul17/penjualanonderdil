    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Supplier
            <small>Update Supplier</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('supplier')?>">Supplier</a></li>
            <li class="active"><a href="<?php echo base_url('supplier/update/'.$kd_supplier)?>">Update Supplier</a></li>
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
                                    <a href="<?php echo base_url('supplier');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                    <a href="<?php echo base_url('supplier/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
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
                                if(isset($pesan)){
                                    echo '<div class="alert alert-info alert-dismissable"><i class="fa fa-info"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> '.$pesan.'</div>';
                                };
                                ?>
                            </div>
                        </div>
                        <div class="cleaner_h3"></div>
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('supplier/update/'.$kd_supplier) ?>">

                            <?php
                            if (form_error('kd_supplier')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                            <label for="kd_supplier" class="col-md-2 control-label">Kode Supplier</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control flat" id="kd_supplier" name="kd_supplier" value='<?php echo $kd_supplier; ?>' readonly>
                            </div>
                            <div class="col-md-4"><?php echo form_error('kd_supplier'); ?></div>
                        </div>

                        <?php
                        if (form_error('nama_supplier')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="nama_supplier" class="col-md-2 control-label">Nama Supplier</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control flat" id="nama_supplier" name="nama_supplier" value='<?php echo $nama_supplier; ?>' readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('nama_supplier'); ?></div>
                    </div>

                    <?php
                    if (form_error('alamat')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="alamat" class="col-md-2 control-label">Alamat</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control flat" id="alamat" name="alamat" value='<?php echo $alamat; ?>' readonly>
                    </div>
                    <div class="col-md-4"><?php echo form_error('alamat'); ?></div>
                </div>

                <?php
                if (form_error('kota')) {
                    echo '<div class="form-group has-error">';
                }else{
                    echo '<div class="form-group">';
                }
                ?>
                <label for="kota" class="col-md-2 control-label">Kota</label>
                <div class="col-md-2">
                    <input type="text" class="form-control flat" id="kota" name="kota" value='<?php echo $kota; ?>' readonly>
                </div>
                <div class="col-md-4"><?php echo form_error('kota'); ?></div>
            </div>
                <?php
                if (form_error('telepon')) {
                    echo '<div class="form-group has-error">';
                }else{
                    echo '<div class="form-group">';
                }
                ?>
                <label for="telepon" class="col-md-2 control-label">Telepon</label>
                <div class="col-md-2">
                    <input type="text" class="form-control flat" id="telepon" name="telepon" value='<?php echo $telepon; ?>' readonly>
                </div>
                <div class="col-md-4"><?php echo form_error('telepon'); ?></div>
            </div>
    </form>
    <div class="cleaner_h10"></div>
        <hr>    
        <?php
        /*                  
        <div class="row">
            <div class="col-md-12">  
                <div class="box-button">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Data Barang Supply</h4>
                        </div>
                    </div>
                </div>
                <div class="cleaner_h3"></div>
            </div>
            <div class="box-body table-responsive col-md-6">
                <div class="cleaner_h3"></div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:180px;">Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Brand</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data_supplier_barang as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $value->kd_barang; ?></td>
                                <td><?php echo $value->kategori.' '.$value->type; ?></td>
                                <td><?php echo $value->brand; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="cleaner_h20"></div>
        */
        ?>
    <div class="box-button">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo base_url('supplier/update/'.$kd_supplier);?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> Update</a>
                <a href="#deleteModal" class="btn btn-default flat" role="button" data-toggle="modal" onclick="deleteModalFunction('<?php echo $kd_supplier; ?>')"><i class="fa fa-trash fa-fw"></i> Delete</a>
            </div>
        </div>
        <div class="cleaner_h3"></div>
    </div>
    <div class="cleaner_h20"></div>
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
                    <h4>supplier ini akan dihapus, Anda Yakin?</h4>
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
        $("#deleteModalFunction").attr("href","<?php echo base_url();?>supplier/delete/"+temp_id);
    }
    </script>