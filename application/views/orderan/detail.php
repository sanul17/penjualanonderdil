    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Orderan
            <small>Update Orderan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('orderan')?>">Orderan</a></li>
            <li class="active"><a href="<?php echo base_url('orderan/update/')?>">Update Orderan</a></li>
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
                                    <a href="<?php echo base_url('orderan');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
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
                                    <h4>Data Pelanggan</h4>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                            <?php
                            if (form_error('kd_order')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                            <label for="kd_order" class="col-md-6 control-label">Kode Orderan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control flat" id="kd_order" name="kd_order" value='<?php echo $kd_order; ?>' readonly>
                            </div>
                            <div class="col-md-4"><?php echo form_error('kd_order'); ?></div>
                        </div>

                        <?php
                        if (form_error('tgl_order')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="tgl_order" class="col-md-6 control-label pull-left">Tanggal Orderan</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control flat" id="tgl_order" name="tgl_order" value='<?php echo gmdate('d/m/Y - H:i:s', $tgl_order); ?>' readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('tgl_order'); ?></div>
                    </div>
                    <?php
                    if (form_error('potongan')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="potongan" class="col-md-6 control-label">Potongan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control flat" id="potongan" readonly name="potongan" value='<?php echo $potongan;  ?>'>
                    </div>
                    <div class="col-md-6"><?php echo form_error('potongan'); ?></div>
                </div>
                </div>

                                <div class="col-md-6">
                    <?php
                    if (form_error('nama_pelanggan')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="nama_pelanggan" class="col-md-4 control-label">Nama Pelanggan</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control flat" id="nama_pelanggan" name="nama_pelanggan" value='<?php echo $nama_pelanggan; ?>' readonly>
                    </div>
                    <div class="col-md-4"><?php echo form_error('nama_pelanggan'); ?></div>
                </div>

                           <?php
                    if (form_error('alamat')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="alamat" class="col-md-4 control-label">Alamat Pelanggan</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control flat" id="alamat" name="alamat" value='<?php echo $alamat; ?>' readonly>
                    </div>
                    <div class="col-md-4"><?php echo form_error('alamat'); ?></div>
                </div>

                        <?php
                        if (form_error('kd_sales')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="kd_sales" class="col-md-4 control-label pull-left">Kode Sales</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control flat" id="kd_sales" name="kd_sales" value='<?php echo $kd_sales; ?>' readonly>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control flat" id="nama_sales" name="nama_sales" value='<?php echo $nama_sales; ?>' readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('kd_sales'); ?></div>
                    </div>
                </div>
            </div>
        </div>
                <hr>                        
                <div class="box-button">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Data Orderan</h4>
                        </div>
                    </div>
                    <div class="cleaner_h3"></div>
                </div>
                <div class="box-body table-responsive">
                    <div class="cleaner_h3"></div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:120px;">Kode Barang</th>
                                <th>Nama Barang</th>
                                <th style="width:100px;">Quantity</th>
                                <th style="width:150px;">Harga</th>
                                <th style="width:150px;">Sub Total</th></tr>
                        </thead>
                        <tbody>
                    <?php
                    foreach ($data_order_detail as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $value->kd_barang; ?></td>
                            <td><?php echo $value->nama_barang; ?></td>
                            <td><?php echo $value->qty; ?></td>
                            <td><?php echo $value->harga; ?></td>
                            <td><?php echo ($value->qty*$value->harga); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                        </tbody>
                        <tfoot>
                            <tr class="gradeX">
                                <td colspan="4">Total</td>
                                <td>Rp. <?php echo $total; ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="cleaner_h20"></div>
                </form>
                <div class="cleaner_h20"></div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>

</section><!-- /.content -->