    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Tipe Kategori
            <small>Update Tipe Kategori</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('tipe_kategori')?>">Tipe Kategori</a></li>
            <li class="active"><a href="<?php echo base_url('tipe_kategori/update/'.$id_tipe_kategori)?>">Update Tipe Kategori</a></li>
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
                                    <a href="<?php echo base_url('tipe_kategori');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                    <a href="<?php echo base_url('tipe_kategori/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
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
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('tipe_kategori/update/'.$id_tipe_kategori) ?>">
                            
                            <?php
                            if (form_error('kategori')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="kategori" class="col-md-2 control-label">Kategori</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control flat" id="kategori" name="kategori" value='<?php echo $kategori; ?>'>
                                </div>
                                <div class="col-md-4"><?php echo form_error('kategori'); ?></div>
                            </div>
                            
                            <?php
                            if (form_error('type')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="type" class="col-md-2 control-label">Type</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control flat" id="type" name="type" value='<?php echo $type; ?>'>
                                </div>
                                <div class="col-md-4"><?php echo form_error('type'); ?></div>
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