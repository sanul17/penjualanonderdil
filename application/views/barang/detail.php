    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Barang
            <small>Detail Barang</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('barang')?>">Barang</a></li>
            <li class="active"><a href="<?php echo base_url('barang/detail/'.$kd_barang)?>">Detail Barang</a></li>
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
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('barang/detail/'.$kd_barang) ?>" readonly>
                            
                            <?php
                            if (form_error('kd_barang')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="kd_barang" class="col-md-2 control-label">Kode Barang</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control flat" id="kd_barang" name="kd_barang" value='<?php echo $kd_barang; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('kd_barang'); ?></div>
                            </div>
                            
                            <?php
                            if (form_error('nama_barang')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="nama_barang" class="col-md-2 control-label">Nama Barang</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control flat" id="nama_barang" name="nama_barang" value='<?php echo $nama_barang; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('nama_barang'); ?></div>
                            </div>
                            
                            <?php
                            if (form_error('kategori')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="kategori" class="col-md-2 control-label">Kategori</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control flat" id="kategori" name="kategori" value='<?php echo $kategori; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('kategori'); ?></div>
                            </div>
                            
                            <?php
                            if (form_error('brand')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="brand" class="col-md-2 control-label">Brand</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control flat" id="brand" name="brand" value='<?php echo $brand; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('brand'); ?></div>
                            </div>
                            
                            <?php
                            if (form_error('type')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="type" class="col-md-2 control-label">Type</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control flat" id="type" name="type" value='<?php echo $type; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('type'); ?></div>
                            </div>
                            
                            <?php
                            if (form_error('min_stok')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="min_stok" class="col-md-2 control-label">Minimal Stok</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control flat" id="min_stok" name="min_stok" value='<?php echo $min_stok; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('min_stok'); ?></div>
                            </div>
                            
                            <?php
                            if (form_error('stok')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="stok" class="col-md-2 control-label">Stok</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control flat" id="stok" name="stok" value='<?php echo $stok; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('stok'); ?></div>
                            </div>
                            
                            <?php
                            if (form_error('modal')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="modal" class="col-md-2 control-label">Modal</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control flat" id="modal" name="modal" value='<?php echo $modal; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('modal'); ?></div>
                            </div>
                            <?php
                            if (form_error('harga')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="harga" class="col-md-2 control-label">Harga</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control flat" id="harga" name="harga" value='<?php echo $harga; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('harga'); ?></div>
                            </div>
                            <?php
                            if (form_error('posisi')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="posisi" class="col-md-2 control-label">Posisi</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control flat" id="posisi" name="posisi" value='<?php echo $posisi; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('posisi'); ?></div>
                            </div>
                        </form>
                        <div class="cleaner_h10"></div>
                        <div class="box-button">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?php echo base_url('barang/addStok/'.$kd_barang);?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> Tambah Stok</a>
                                    <a href="<?php echo base_url('barang/update/'.$kd_barang);?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> Update</a>
                                    <a href="#deleteModal" class="btn btn-default flat" role="button" data-toggle="modal" onclick="deleteModalFunction('<?php echo $kd_barang; ?>')"><i class="fa fa-trash fa-fw"></i> Delete</a>
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
                    <h4>Barang ini akan dihapus, Anda Yakin?</h4>
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
        $("#deleteModalFunction").attr("href","<?php echo base_url();?>barang/delete/"+temp_id);
    }
    </script>