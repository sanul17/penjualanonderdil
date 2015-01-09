    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Sales
            <small>Detail Sales</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('sales')?>">Sales</a></li>
            <li class="active"><a href="<?php echo base_url('sales/detail/'.$kd_sales)?>">Detail Sales</a></li>
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
                                    <a href="<?php echo base_url('sales');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                    <a href="<?php echo base_url('sales/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
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
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('sales/detail/'.$kd_sales) ?>" readonly>
                            
                            <?php
                            if (form_error('kd_sales')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="kd_sales" class="col-md-2 control-label">Kode sales</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control flat" id="kd_sales" name="kd_sales" value='<?php echo $kd_sales; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('kd_sales'); ?></div>
                            </div>
                            
                            <?php
                            if (form_error('nama_sales')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="nama_sales" class="col-md-2 control-label">Nama Sales</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control flat" id="nama_sales" name="nama_sales" value='<?php echo $nama_sales; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('nama_sales'); ?></div>
                            </div>
                            
                            <?php
                            if (form_error('username')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="username" class="col-md-2 control-label">Username</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control flat" id="username" name="username" value='<?php echo $username; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('username'); ?></div>
                            </div>
                            
                            <?php
                            if (form_error('password')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="password" class="col-md-2 control-label">Password</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control flat" id="password" name="password" value='<?php echo $password; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('password'); ?></div>
                            </div>
                        </form>
                        <div class="cleaner_h10"></div>
                        <div class="box-button">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?php echo base_url('sales/update/'.$kd_sales);?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> Update</a>
                                    <a href="#deleteModal" class="btn btn-default flat" role="button" data-toggle="modal" onclick="deleteModalFunction('<?php echo $kd_sales; ?>')"><i class="fa fa-trash fa-fw"></i> Delete</a>
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
                    <h4>sales ini akan dihapus, Anda Yakin?</h4>
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
        $("#deleteModalFunction").attr("href","<?php echo base_url();?>sales/delete/"+temp_id);
    }
    </script>