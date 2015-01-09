    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Sales
            <small>Update Sales</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('sales')?>">Sales</a></li>
            <li class="active"><a href="<?php echo base_url('sales/update/'.$kd_sales)?>">Update Sales</a></li>
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
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('sales/update/'.$kd_sales) ?>">
                            
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
                                    <input type="text" class="form-control flat" id="nama_sales" name="nama_sales" value='<?php echo $nama_sales; ?>'>
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
                                    <input type="text" class="form-control flat" id="username" name="username" value='<?php echo $username; ?>'>
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
                                    <input type="text" class="form-control flat" id="password" name="password" value='<?php echo $password; ?>'>
                                </div>
                                <div class="col-md-4"><?php echo form_error('password'); ?></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <button type="submit" class="btn btn-primary flat">Simpan</button>
                                    <button type="reset" class="btn btn-default flat">Reset</button>
                                </div>
                            </div>
                        </form>
                        <div class="cleaner_h20"></div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

                                    </section><!-- /.content -->