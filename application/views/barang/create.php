    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Barang
            <small>Manajemen Barang</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('barang')?>">Barang</a></li>
            <li class="active"><a href="<?php echo base_url('barang/create')?>">Create Barang</a></li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Create Barang</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <div class="cleaner_h3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if(isset($pesan)){
                                    echo '<div class="alert alert-info alert-dismissable"><i class="fa fa-info"></i> '.$pesan.'</div>';
                                };
                                ?>
                            </div>
                        </div>
                        <div class="cleaner_h3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?php echo base_url('barang');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                <a href="<?php echo base_url('barang/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
                            </div>
                        </div>
                        <div class="cleaner_h3"></div>
                        
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

                                    </section><!-- /.content -->