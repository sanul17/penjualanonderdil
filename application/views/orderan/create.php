<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Master Orderan
        <small>Create Orderan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url('orderan')?>">Orderan</a></li>
        <li class="active"><a href="<?php echo base_url('orderan/create')?>">Create Orderan</a></li>
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
                    <form id="create-order" class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('orderan/create') ?>">

                        <?php
                        if (form_error('kd_order')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="kd_order" class="col-md-2 control-label">Kode Orderan</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control flat" id="kd_order" name="kd_order" value='<?php echo $kd_order; ?>' readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('kd_order'); ?></div>
                    </div>

                    <?php
                    if (form_error('kd_sales')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="kd_sales" class="col-md-2 control-label pull-left">Kode Sales</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control flat" id="kd_sales" name="kd_sales" value='<?php echo $kd_sales; ?>' readonly>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control flat" id="nama_sales" name="nama_sales" value='<?php echo $nama_sales; ?>' readonly>
                    </div>
                    <div class="col-md-4"><?php echo form_error('kd_sales'); ?></div>
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
                    <input type="text" class="form-control flat" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo set_value('nama_pelanggan'); ?>">
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
            <label for="alamat" class="col-md-2 control-label">Alamat Pelanggan</label>
            <div class="col-md-4">
                <input type="text" class="form-control flat" id="alamat" name="alamat" value="<?php echo set_value('alamat'); ?>">
            </div>
            <div class="col-md-4"><?php echo form_error('alamat'); ?></div>
        </div>
        <?php
        if (form_error('potongan')) {
            echo '<div class="form-group has-error">';
        }else{
            echo '<div class="form-group">';
        }
        ?>
        <label for="potongan" class="col-md-2 control-label">Potongan</label>
        <div class="col-md-4">
            <input type="text" class="form-control flat" id="potongan" name="potongan" value='<?php echo set_value('potongan'); ?>'>
        </div>
        <div class="col-md-4"><?php echo form_error('potongan'); ?></div>
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
                    <th style="width:150px;">Sub Total</th>
                    <th style="text-align:center; width:150px;"  class="action"><a href="#modalAddPenjualanBarang" data-toggle="modal" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> Add Barang</a></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr class="gradeX">
                    <td colspan="4">Total</td>
                    <td><span id="total-label"></span><input type="hidden" class="form-control" id="total" nama="total" value="0" readonly></td>
                    <td style="text-align:center;" colspan="4"> - </td>
                </tr>
            </tfoot>
        </table>
        <div class="cleaner_h20"></div>
        <div class="form-group">
            <div class="col-sm-8">
                <button type="submit" id="submit" disabled class="btn btn-primary flat">Tambahkan Order</button>
                <a href="<?php echo base_url('orderan');?>" class="btn btn-default flat">Cancel</a>
            </div>
        </div>
    </form>
    <div class="cleaner_h20"></div>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>

</section><!-- /.content -->


<!-- ============ MODAL ADD PENJUALAN BARANG =============== -->
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
                                        <option value="<?php echo $value->kd_barang?>"><?php echo $value->nama_barang?></option>
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
                    <button type="submit" class="btn btn-primary" disabled="disabled" id="add" name="add">Simpan</button>
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
    $(this).closest('#form-add-order').find('#harga').val('');
    $(this).closest('#form-add-order').find('#qty').val('');
    $(this).closest('#form-add-order').find('#kd_barang_add').val('').trigger("chosen:updated");
    $('#detail_barang').html('');
    $('#form-add-order').find('#add').attr('disabled', 'disabled');
});

$("#kd_barang_add").change(function(){
    var kd_barang = $("#kd_barang_add").val();
    $.ajax({
        type: "POST",
        url : "<?php echo base_url('orderan/get_detail_barang'); ?>",
        data: "kd_barang="+kd_barang,
        cache:false,
        success: function(data){
            $('#detail_barang').html(data);
            $('#form-add-order').find('#add').removeAttr('disabled');
        }
    });
});

$("#add").on('click', function(event) {
    event.preventDefault();
    var kd_barang = $(this).closest('#form-add-order').find('#kd_barang').val();
    var nama_barang = $(this).closest('#form-add-order').find('#nama_barang').val();
    var harga = $(this).closest('#form-add-order').find('#harga').val();
    var qty = $(this).closest('#form-add-order').find('#qty').val();
    var subtotal = Number(harga)*Number(qty);
    var total = $('#total').val();
    total = Number(total)+Number(subtotal);

    if (qty) {
        $row = $('<tr class="gradeX"></tr>');
        $tdKode = $('<td>'+kd_barang+'<input type="hidden" class="form-control flat" name="kd_barang[]" readonly value="'+kd_barang+'"></td>');
        $tdNama = $('<td>'+nama_barang+'</td>');
        $tdHarga = $('<td>'+harga+'<input type="hidden" class="form-control flat harga" name="harga[]" readonly value="'+harga+'"></td>');
        $tdQty = $('<td><input type="text" class="form-control flat qty" name="qty[]" value="'+qty+'"></td>');
        $tdSubtotal = $('<td><span class="subtotal-label">'+subtotal+'</span><input type="hidden" class="form-control flat subtotal" name="subtotal[]" value="'+subtotal+'"></td>');
        $tdDelbutton = $('<td style="text-align:center; width:150px;" ><a class="btn btn-default flat delbutton"><i class="fa fa-trash fa-fw"></i> Delete</a></td>');

        $row.append($tdKode).append($tdNama).append($tdQty).append($tdHarga).append($tdSubtotal).append($tdDelbutton);
        $row.appendTo('tbody');
        $('#total').val(total);
        $('#total-label').html(total);
    };

    $(this).closest('#form-add-order').find('#kd_barang').val('');
    $(this).closest('#form-add-order').find('#nama_barang').val('');
    $(this).closest('#form-add-order').find('#harga').val('');
    $(this).closest('#form-add-order').find('#qty').val('');
    $(this).closest('#form-add-order').find('#kd_barang_add').val('').trigger("chosen:updated");
    $('#detail_barang').html('');
    $('#form-add-order').find('#add').attr('disabled', 'disabled');
    $(this).closest('#modalAddPenjualanBarang').modal('hide');
    $('#submit').removeAttr('disabled');

    $(".delbutton").on('click', function(event) {
        event.preventDefault();
        $(this).closest('tr.gradeX').remove();
                var all_sub_total = $('.subtotal');
        var total_val = 0;
        for (var i = 0; i < all_sub_total.length; i++) {
            total_val += Number(all_sub_total[i].value);
        };
        $('#total').val(total_val);
        $('#total-label').html(total_val);

        if (qty == '' || qty == 0) {
            $('#submit').attr('disabled', 'disabled');
        }else{
            $('#submit').removeAttr('disabled');
        }

    });

    $('.gradeX').find('.qty').on('change keyup keydown', function(event) {
        var qty = $(this).val();
        var harga = $(this).closest('.gradeX').find('.harga').val();
        var subtotal=Number(harga)*Number(qty);
        $(this).closest('.gradeX').find('.subtotal').val(subtotal);
        $(this).closest('.gradeX').find('.subtotal-label').html(subtotal);
        var all_sub_total = $('.subtotal');
        var total_val = 0;
        for (var i = 0; i < all_sub_total.length; i++) {
            total_val += Number(all_sub_total[i].value);
        };
        $('#total').val(total_val);
        $('#total-label').html(total_val);

        if (qty == '' || qty == 0) {
            $('#submit').attr('disabled', 'disabled');
        }else{
            $('#submit').removeAttr('disabled');
        }
    });

});

$("#form-add-order").validate({
    rules: {
        qty: {
            required: true,
            digits: true
        }
    }
});

$("#create-order").validate({
    rules: {
        nama_pelanggan: {
            required: true,
            minlength: 2
        },

        potongan: {
            required : true,
            digits: true
        },


    }


});


</script>