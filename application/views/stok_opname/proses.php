    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Stok Opname
            <small>Proses</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url('barang')?>">Barang</a></li>
            <li class="active"><a href="<?php echo base_url('stok_opname')?>">Stok Opname</a></li>
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
                                    <a href="<?php echo base_url('stok_opname')?>" class="btn btn-default flat"><i class="fa fa-cubes fa-fw"></i>Stok Opname</a>
                                    <a href="<?php echo base_url('stok_opname/create')?>" class="btn btn-default flat"><i class="fa fa-cubes fa-fw"></i>Create Stok Opname</a>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                    </div><!-- /.box-header -->
                    <hr>
                    <?php
                    if (count($barang_opname) > 0) {
                        ?>
                        <div class="box-body table-responsive">
                            <div class="cleaner_h3"></div>                        
                            <div class="box-button">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Data Stok Opname</h4>
                                    </div>
                                </div>
                                <div class="cleaner_h3"></div>
                            </div>
                            <form class="form-horizontal" id="create-cash" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('stok_opname/proses/'.$kd_opname) ?>">

                                <?php
                                if (form_error('kd_opname')) {
                                    echo '<div class="form-group has-error">';
                                }else{
                                    echo '<div class="form-group">';
                                }
                                ?>
                                <label for="kd_opname" class="col-md-2 control-label">Kode Opname</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control flat" id="kd_opname" name="kd_opname" value='<?php echo $kd_opname; ?>' readonly>
                                </div>
                                <div class="col-md-4"><?php echo form_error('kd_opname'); ?></div>
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
                        if (form_error('kd_supplier')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <div class="col-md-4"><?php echo form_error('kd_supplier'); ?></div>
                    </div>

                    <hr>                        
                    <div class="box-button">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Data Stok Opname</h4>
                            </div>
                        </div>
                        <div class="cleaner_h3"></div>
                    </div>

                    <div class="box-body table-responsive">
                        <div class="cleaner_h3"></div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:150px;">Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Brand</th>
                                    <th style="width:150px;">Stok</th>
                                    <th style="width:150px;">Stok Fisik</th>
                                    <th style="width:150px;">Selisih</th> 
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($barang_opname as $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value['kd_barang']; ?><input type="hidden" name="kd_barang[]" value="<?php echo $value['kd_barang']; ?>"></td>
                                        <td><?php echo $value['nama_barang']; ?></td>
                                        <td><?php echo $value['brand']; ?></td>
                                        <td><?php echo $value['stok']; ?><input type="hidden" name="stok_komp[]" value="<?php echo $value['stok']; ?>"></td>
                                        <td><?php echo $value['stok_fisik']; ?><input type="hidden" name="stok_fisik[]" value="<?php echo $value['stok_fisik']; ?>"></td>
                                        <td><?php echo $value['selisih']; ?><input type="hidden" name="selisih[]" value="<?php echo $value['selisih']; ?>"></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="cleaner_h20"></div>
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="submit" class="btn btn-primary flat" id="sesuaikan" name="sesuaikan" value="Sesuaikan Sebagian">
                                <input type="submit" class="btn btn-danger flat" id="sesuaikan_seluruh" name="sesuaikan_seluruh" value="Sesuaikan Seluruh Stok">
                                <a href="<?php echo base_url('stok_opname/add/'.$kd_opname);?>" class="btn btn-info flat">Add More</a>
                                <a href="<?php echo base_url('stok_opname');?>" class="btn btn-default flat">Cancel</a>
                            </div>
                        </div>
                    </form>
                    <div class="cleaner_h20"></div>
                </div><!-- /.box-body -->

            </form>

            <?php
        }else{
            ?>
                    <div class="box-body table-responsive">
            <h3>Semua Barang Sesuai</h3>
            <a href="<?php echo base_url('stok_opname/create')?>" class="btn btn-danger flat">Back</a>
            </div>
            <?php
        }
        ?>
        <div class="cleaner_h20"></div>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>

</section><!-- /.content -->


<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>"></script>
<script type="text/javascript" src="//cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.js"></script>
<script type="text/javascript">

$("#dataTable").DataTable({
    responsive: true,
    "aoColumnDefs": [
    { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
    ],
    "order": [[ 1, "desc" ]]
});    

</script>