    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transaksi Pembelian
            <small>Detail Pembelian</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('pembelian')?>">Pembelian</a></li>
            <li class="active"><a href="<?php echo base_url('pembelian/detail/'.$kd_pembelian)?>">Detail Pembelian</a></li>
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
                                    <a href="<?php echo base_url('pembelian');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                    <?php if ($this->session->userdata('level') == 'sales') {
                                        ?>
                                        <a href="<?php echo base_url('pembelian/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
                                        <?php
                                    }
                                    ?>
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
                                    <h4>Data Supplier</h4>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">

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
                        <label for="nama_supplier" class="col-md-2 control-label pull-left">Nama Supplier</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control flat" id="nama_supplier" name="nama_supplier" value='<?php echo $nama_supplier; ?>' readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('nama_supplier'); ?></div>
                    </div>
        </div>
        <hr>                        
        <div class="box-button">
            <div class="row">
                <div class="col-md-12">
                    <h4>Data Pembelian</h4>
                </div>
            </div>
            <div class="cleaner_h3"></div>
        </div>
        <div class="box-body table-responsive">
            <div class="cleaner_h3"></div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Harga Beli</th>
                        <th>Sub Total</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data_pembelian_detail as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $value->kategori.' '.$value->type; ?></td>
                                <td><?php echo $value->brand; ?></td>
                                <td><?php echo $value->qty; ?></td>
                                <td>Rp. <?php echo number_format($value->harga_beli, 2, ",", "."); ?></td>
                                <td>Rp. <?php echo number_format($value->qty*$value->harga_beli, 2, ",", "."); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                    <tr class="gradeX">
                        <td colspan="4">Total</td>
                        <td>Rp. <?php echo number_format($total, 2, ",", "."); ?></td>
                    </tr>
                    </tfoot>
                </table>
                <div class="cleaner_h20"></div>
                <div class="form-group">
                    <div class="col-sm-8">
                        <?php 
                        /*
                        <a href="<?php echo base_url('pembelian/update/'.$kd_pembelian);?>" class="btn btn-default flat"><i class="fa fa-pencil fa-fw"></i> Update</a>
                        <a href="#deleteModal" role="button" data-toggle="modal" onclick="deleteModalFunction('<?php echo $kd_pembelian; ?>')" class="btn btn-default flat"><i class="fa fa-trash fa-fw"></i> Delete</a>
                        
                    */
                        ?>
                        <a href="<?php echo base_url('pembelian');?>" class="btn btn-default flat">Close</a>
                    </div>
                </div>
            </form>
            <div class="cleaner_h20"></div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
</div>

</section><!-- /.content -->