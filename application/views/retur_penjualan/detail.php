    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Retur Penjualan
            <small>Detail Retur Penjualan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('retur_penjualan')?>">Retur Penjualan</a></li>
            <li class="active"><a href="<?php echo base_url('retur_penjualan/detail/'.$kd_retur_penjualan)?>">Detail Retur Penjualan</a></li>
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
                                    <a href="<?php echo base_url('retur_penjualan');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
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
                                    <h4>Data Retur Penjualan</h4>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">

                            
                            <?php
                            if (form_error('kd_retur_penjualan')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                            <label for="kd_retur_penjualan" class="col-md-2 control-label">Kode Retur Penjualan</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control flat" id="kd_retur_penjualan" name="kd_retur_penjualan" value='<?php echo $kd_retur_penjualan; ?>' readonly>
                            </div>
                            <div class="col-md-4"><?php echo form_error('kd_retur_penjualan'); ?></div>
                        </div>

                    <?php
                    if (form_error('tgl_retur_penjualan')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="tgl_retur_penjualan" class="col-md-2 control-label">Tanggal Retur Penjualan</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control flat" id="tgl_retur_penjualan" name="tgl_retur_penjualan" value='<?php echo gmdate('d M Y - H:i:s', $tgl_retur_penjualan); ?>' readonly>
                    </div>
                    <div class="col-md-4"><?php echo form_error('tgl_retur_penjualan'); ?></div>
                </div>

                        <?php
                        if (form_error('kd_penjualan')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="kd_penjualan" class="col-md-2 control-label">Kode Penjualan</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control flat" id="kd_penjualan" name="kd_penjualan" value='<?php echo $kd_penjualan; ?>' readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('kd_penjualan'); ?></div>
                    </div>


                    <?php
                    if (form_error('tgl_penjualan')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="tgl_penjualan" class="col-md-2 control-label">Tanggal Penjualan</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control flat" id="tgl_penjualan" name="tgl_penjualan" value='<?php echo gmdate('d M Y - H:i:s', $tgl_penjualan); ?>' readonly>
                    </div>
                    <div class="col-md-4"><?php echo form_error('tgl_penjualan'); ?></div>
                </div>

                <?php
                if (form_error('kd_user')) {
                    echo '<div class="form-group has-error">';
                }else{
                    echo '<div class="form-group">';
                }
                ?>
                <label for="kd_user" class="col-md-2 control-label pull-left">User</label>
                <div class="col-md-2">
                    <input type="text" class="form-control flat" id="kd_user" name="kd_user" value='<?php echo $kd_user; ?>' readonly>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control flat" id="nama_user" name="nama_user" value="<?php echo $nama_user; ?>" readonly>
                </div>
                <div class="col-md-4"><?php echo form_error('kd_user'); ?></div>
            </div>

            <?php
            if (form_error('nama_pelanggan')) {
                echo '<div class="form-group has-error">';
            }else{
                echo '<div class="form-group">';
            }
            ?>
            <label for="nama_pelanggan" class="col-md-2 control-label">Nama Pelanggan</label>
            <div class="col-md-4">
                <input type="text" class="form-control flat" id="nama_pelanggan" name="nama_pelanggan" value='<?php echo $nama_pelanggan; ?>' readonly>
            </div>
            <div class="col-md-4"><?php echo form_error('nama_pelanggan'); ?></div>
        </div>
        <hr>                        
        <div class="box-button">
            <div class="row">
                <div class="col-md-12">
                    <h4>Data Retur Penjualan</h4>
                </div>
            </div>
            <div class="cleaner_h3"></div>
        </div>
        <div class="box-body table-responsive">
            <div class="cleaner_h3"></div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="width:150px;">Quantity Retur</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_retur_penjualan_detail as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $value->kd_barang; ?></td>
                            <td><?php echo $value->kategori.' '.$value->type.' '.$value->brand; ?></td>
                            <td><?php echo $value->qty_retur; ?></td>
                            <td><?php echo $value->keterangan; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
                <div class="cleaner_h20"></div>
                <div class="form-group">
                    <div class="col-sm-8"><a href="<?php echo base_url('retur_penjualan');?>" class="btn btn-default flat">Close</a>
                    </div>
                </div>
            </form>
            <div class="cleaner_h20"></div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
</div>

</section><!-- /.content -->