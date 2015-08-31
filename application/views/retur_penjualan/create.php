    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Retur Penjualan
            <small>Create Retur Penjualan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('retur_penjualan')?>">Retur Penjualan</a></li>
            <li class="active"><a href="<?php echo base_url('retur_penjualan/create')?>">Create Retur Penjualan</a></li>
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
                        <div class="cleaner_h3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if(isset($pesan)){
                                    echo '<div class="alert alert-info alert-dismissable"><i class="fa fa-info"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> '.$this->session->flashdata('pesan').'</div>';
                                };
                                ?>
                            </div>
                        </div>
                        <div class="cleaner_h3"></div>                        
                        <div class="box-button">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Data Retur Penjualan</h4>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                        <form class="form-horizontal" id="create-cash" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('retur_penjualan/create/'.$kd_penjualan) ?>">

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
                        <th style="width:150px;">Quantity Sisa</th>
                        <th style="width:150px;">Quantity Retur</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_penjualan_detail as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $value->kd_barang; ?><input type="hidden" class="form-control flat" name="kd_barang[]" value="<?php echo $value->kd_barang; ?>"></td>
                            <td><?php echo $value->kategori.' '.$value->type.' '.$value->brand; ?></td>
                            <td><?php echo $value->qty; ?></td>
                                <td>
                                    <select class="form-control flat" id="qty_retur" name="qty_retur[]">
                                        <?php
                                        for ($i=0; $i <= $value->qty; $i++) { 
                                            ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control flat" name="keterangan[]" ></td>
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
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-primary flat" id="submit">Retur</button>
                    <a href="<?php echo base_url('retur_penjualan');?>" class="btn btn-default flat">Cancel</a>
                </div>
            </div>
        </form>
        <div class="cleaner_h20"></div>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>

</section><!-- /.content -->