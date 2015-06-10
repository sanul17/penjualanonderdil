    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Retur Pembelian
            <small>Detail Retur Pembelian</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('retur_pembelian')?>">Retur Pembelian</a></li>
            <li class="active"><a href="<?php echo base_url('retur_pembelian/detail/'.$kd_retur_pembelian)?>">Detail Retur Pembelian</a></li>
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
                                    <a href="<?php echo base_url('retur_pembelian');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
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
                                    <h4>Data Retur Pembelian</h4>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">

                            
                            <?php
                            if (form_error('kd_retur_pembelian')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                            <label for="kd_retur_pembelian" class="col-md-2 control-label">Kode Retur Pembelian</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control flat" id="kd_retur_pembelian" name="kd_retur_pembelian" value='<?php echo $kd_retur_pembelian; ?>' readonly>
                            </div>
                            <div class="col-md-4"><?php echo form_error('kd_retur_pembelian'); ?></div>
                        </div>

                    <?php
                    if (form_error('tgl_retur_pembelian')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="tgl_retur_pembelian" class="col-md-2 control-label">Tanggal Retur Pembelian</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control flat" id="tgl_retur_pembelian" name="tgl_retur_pembelian" value='<?php echo gmdate('d M Y - H:i:s', $tgl_retur_pembelian); ?>' readonly>
                    </div>
                    <div class="col-md-4"><?php echo form_error('tgl_retur_pembelian'); ?></div>
                </div>

                        <?php
                        if (form_error('kd_pembelian')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="kd_pembelian" class="col-md-2 control-label">Kode Pembelian</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control flat" id="kd_pembelian" name="kd_pembelian" value='<?php echo $kd_pembelian; ?>' readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('kd_pembelian'); ?></div>
                    </div>


                    <?php
                    if (form_error('tgl_pembelian')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="tgl_pembelian" class="col-md-2 control-label">Tanggal Pembelian</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control flat" id="tgl_pembelian" name="tgl_pembelian" value='<?php echo gmdate('d M Y - H:i:s', $tgl_pembelian); ?>' readonly>
                    </div>
                    <div class="col-md-4"><?php echo form_error('tgl_pembelian'); ?></div>
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
        <hr>                        
        <div class="box-button">
            <div class="row">
                <div class="col-md-12">
                    <h4>Data Retur Pembelian</h4>
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
                    foreach ($data_retur_pembelian_detail as $key => $value) {
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
                    <div class="col-sm-8"><a href="<?php echo base_url('retur_pembelian');?>" class="btn btn-default flat">Close</a>
                    </div>
                </div>
            </form>
            <div class="cleaner_h20"></div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
</div>

</section><!-- /.content -->