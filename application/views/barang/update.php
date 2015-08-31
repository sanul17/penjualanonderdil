    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Barang
            <small>Update Barang</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('barang')?>">Barang</a></li>
            <li class="active"><a href="<?php echo base_url('barang/update/'.$kd_barang)?>">Update Barang</a></li>
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
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('barang/update/'.$kd_barang) ?>">

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
                        if (form_error('tipe_kategori')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="tipe_kategori" class="col-md-2 control-label">Tipe Kategori</label>
                        <div class="col-md-3">
                            <select class="chzn-select form-control flat" name="tipe_kategori" data-placeholder="Pilih Tipe Kategori">
                                <?php
                                foreach($list_tipe_kategori as $key => $value) {
                                    $selected = "";
                                    if ($value->id_tipe_kategori == $id_tipe_kategori) {
                                        $selected = "selected";
                                    }
                                    echo "<option value='".$value->id_tipe_kategori."' ".$selected.">".$value->kategori." ".$value->type."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4"><?php echo form_error('tipe_kategori'); ?></div>
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
                        <input type="text" class="form-control flat" id="brand" name="brand" value='<?php echo $brand; ?>'>
                    </div>
                    <div class="col-md-4"><?php echo form_error('brand'); ?></div>
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
                    <input type="text" class="form-control flat" id="min_stok" name="min_stok" value='<?php echo $min_stok; ?>'>
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
                <input type="text" class="form-control flat" id="stok" name="stok" value='<?php echo $stok; ?>'>
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
            <input type="text" class="form-control flat" id="modal" name="modal" value='<?php echo $modal; ?>'>
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
        <input type="text" class="form-control flat" id="harga" name="harga" value='<?php echo $harga; ?>'>
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
    <input type="text" class="form-control flat" id="posisi" name="posisi" value='<?php echo $posisi; ?>'>
</div>
<div class="col-md-4"><?php echo form_error('posisi'); ?></div>
</div>
                            <?php
                            if (form_error('keterangan')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                                <label for="keterangan" class="col-md-2 control-label">Keterangan</label>
                                <div class="col-md-3">
                                    <textarea class="form-control flat" id="keterangan" name="keterangan"><?php echo $keterangan; ?></textarea>
                                </div>
                                <div class="col-md-4"><?php echo form_error('keterangan'); ?></div>
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