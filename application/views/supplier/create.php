    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Supplier
            <small>Create Supplier</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('supplier')?>">Supplier</a></li>
            <li class="active"><a href="<?php echo base_url('supplier/create')?>">Create Supplier</a></li>
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
                                    <a href="<?php echo base_url('supplier');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                    <a href="<?php echo base_url('supplier/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
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
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('supplier/create') ?>">

                            <?php
                            if (form_error('kd_supplier')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                            <label for="kd_supplier" class="col-md-2 control-label">Kode supplier</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control flat" id="kd_supplier" name="kd_supplier" value='<?php echo $kd_supplier; ?>' readonly>
                            </div>
                            <div class="col-md-4"><?php echo form_error('kd_supplier'); ?></div>
                        </div>

                        <?php
                        if (form_error('nama_supplier')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="nama_supplier" class="col-md-2 control-label">Nama supplier</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control flat" id="nama_supplier" name="nama_supplier" value='<?php echo set_value('nama_supplier'); ?>'>
                        </div>
                        <div class="col-md-4"><?php echo form_error('nama_supplier'); ?></div>
                    </div>

                    <?php
                    if (form_error('alamat')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="alamat" class="col-md-2 control-label">Alamat</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control flat" id="alamat" name="alamat" value='<?php echo set_value('alamat'); ?>'>
                    </div>
                    <div class="col-md-4"><?php echo form_error('alamat'); ?></div>
                </div>

                <?php
                if (form_error('kota')) {
                    echo '<div class="form-group has-error">';
                }else{
                    echo '<div class="form-group">';
                }
                ?>
                <label for="kota" class="col-md-2 control-label">Kota</label>
                <div class="col-md-2">
                    <input type="text" class="form-control flat" id="kota" name="kota" value='<?php echo set_value('kota'); ?>'>
                </div>
                <div class="col-md-4"><?php echo form_error('kota'); ?></div>
            </div>

            <?php
            if (form_error('telepon')) {
                echo '<div class="form-group has-error">';
            }else{
                echo '<div class="form-group">';
            }
            ?>
            <label for="telepon" class="col-md-2 control-label">Telepon</label>
            <div class="col-md-2">
                <input type="text" class="form-control flat" id="telepon" name="telepon" value='<?php echo set_value('telepon'); ?>'>
            </div>
            <div class="col-md-4"><?php echo form_error('telepon'); ?></div>
        </div>

        <hr>                      
        <div class="row">
            <div class="col-md-12">  
                <div class="box-button">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Data Barang Supply</h4>
                        </div>
                    </div>
                </div>
                <div class="cleaner_h3"></div>
            </div>
            <div class="box-body table-responsive col-md-6">
                <div class="cleaner_h3"></div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:180px;">Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Brand</th>
                            <th style="text-align:center; width:150px;"  class="action"><a href="#modalAddPenjualanBarang" data-toggle="modal" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> Add Barang</a></th>

                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="cleaner_h20"></div>
        <div class="form-group">
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary flat">Simpan</button>
                <button type="reset" class="btn btn-default flat">Reset</button>
            </div>
        </div>
    </form>
    <div class="cleaner_h20"></div>
</div>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>

</section><!-- /.content -->

<!-- ============ MODAL ADD  BARANG =============== -->
<div id="modalAddPenjualanBarang"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="addLabel">Tambah Barang</h3>
            </div>
            <form class="form-horizontal" id="form-add-order" method="post" role="form"  action="#">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kd_barang" class="col-md-3 control-label">List Barang</label>
                        <div class="col-md-6">
                            <select id="kd_barang_add" class="chzn-select form-control flat" name="kd_barang" data-placeholder="Pilih Barang">
                                <option value=""></option>
                                <?php
                                if(count($data_barang) > 0){
                                    foreach($data_barang as $key => $value){
                                        ?>
                                        <option value="<?php echo $value->kd_barang?>"><?php echo $value->kategori.' '.$value->type.' '.$value->brand;?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div id="detail_barang"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="add" name="add">Simpan</button>
                    <button class="btn" data-dismiss="modal" id="closemodal"  aria-hidden="true">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
$('#closemodal').on('click', function(event) {
    event.preventDefault();
    $(this).closest('#form-add-order').find('#kd_barang').val('');
    $(this).closest('#form-add-order').find('#nama_barang').val('');
    $(this).closest('#form-add-order').find('#brand').val('');
    $(this).closest('#form-add-order').find('#kd_barang_add').val('').trigger("chosen:updated");
    $('#detail_barang').html('');
});

$("#kd_barang_add").change(function(){
    var kd_barang = $("#kd_barang_add").val();
    $.ajax({
        type: "POST",
        url : "<?php echo base_url('supplier/get_detail_barang'); ?>",
        data: "kd_barang="+kd_barang,
        cache:false,
        success: function(data){
            $('#detail_barang').html(data);
        }
    });
});


$("#add").on('click', function(event) {
    event.preventDefault();
    var kd_barang = $(this).closest('#form-add-order').find('#kd_barang').val();
    var nama_barang = $(this).closest('#form-add-order').find('#nama_barang').val();
    var brand = $(this).closest('#form-add-order').find('#brand').val();

    $row = $('<tr class="gradeX"></tr>');
    $tdKd = $('<td><input type="hidden" readonly class="form-control flat kd_barang" name="kd_barang[]" value="'+kd_barang+'">'+kd_barang+'</td>');
    $tdNama = $('<td>'+nama_barang+'</td>');
    $tdBrand = $('<td>'+brand+'</td>');
    $tdDelbutton = $('<td style="text-align:center; width:150px;" ><a class="btn btn-default flat delbutton"><i class="fa fa-trash fa-fw"></i> Delete</a></td>');

    $row.append($tdKd).append($tdNama).append($tdBrand).append($tdDelbutton);
    $row.appendTo('tbody');

    $(this).closest('#form-add-order').find('#kd_barang').val('');
    $(this).closest('#form-add-order').find('#nama_barang').val('');
    $(this).closest('#form-add-order').find('#brand').val('');
    $(this).closest('#form-add-order').find('#kd_barang_add').val('').trigger("chosen:updated");
    $('#detail_barang').html('');
    $(this).closest('#modalAddPenjualanBarang').modal('hide');

    $(".delbutton").on('click', function(event) {
        event.preventDefault();
        $(this).closest('tr.gradeX').remove();
    });
});

    $(".delbutton").on('click', function(event) {
        event.preventDefault();
        $(this).closest('tr.gradeX').remove();
    });

    </script>