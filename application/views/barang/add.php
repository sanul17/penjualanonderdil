    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Barang
            <small>Tambah Stok Barang</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('barang')?>">Barang</a></li>
            <li class="active"><a href="<?php echo base_url('barang/addStok/'.$kd_barang)?>">Tambah Barang</a></li>
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
                                    <a href="<?php echo base_url('barang');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                    <a href="<?php echo base_url('barang/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
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
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('barang/addStok/'.$kd_barang) ?>">

                            <div class="form-group">
                                <label for="kd_barang" class="col-md-2 control-label">Kode Barang</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control flat" id="kd_barang" name="kd_barang" value='<?php echo $kd_barang; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('kd_barang'); ?></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="nama_barang" class="col-md-2 control-label">Nama Barang</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control flat" id="nama_barang" name="nama_barang" value='<?php echo $nama_barang; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('nama_barang'); ?></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="min_stok" class="col-md-2 control-label">Minimal Stok</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control flat" id="min_stok" name="min_stok" value='<?php echo $min_stok; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('min_stok'); ?></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="stok" class="col-md-2 control-label">Stok</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control flat" id="stok" name="stok" value='<?php echo $stok; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('stok'); ?></div>
                            </div>

                            <?php
                            if (form_error('qty')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="qty" class="col-md-2 control-label">Quantity Tambah</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control flat" id="qty" name="qty" value='<?php echo set_value('qty') ?>'>
                                </div>
                                <div class="col-md-4"><?php echo form_error('qty'); ?></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <button type="submit" class="btn btn-primary flat">Tambah</button>
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