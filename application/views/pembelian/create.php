    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transaksi Pembelian
            <small>Create Pembelian</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('pembelian')?>">Pembelian</a></li>
            <li class="active"><a href="<?php echo base_url('pembelian/create')?>">Create Pembelian</a></li>
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
                                    <h4>Data Supplier</h4>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                        <form class="form-horizontal" id="create-cash" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('pembelian/create') ?>">

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
                    if (form_error('kd_supplier')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="kd_supplier" class="col-md-2 control-label">Supplier</label>
                    <div class="col-md-4">
                        <select id="kd_supplier" class="chzn-select form-control flat" name="kd_supplier" data-placeholder="Pilih Supplier">
                            <option value=""></option>
                            <?php
                            if(count($data_supplier) > 0){
                                foreach($data_supplier as $key => $value){
                                    ?>
                                    <option value="<?php echo $value->kd_supplier?>"><?php echo $value->nama_supplier;?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4"><?php echo form_error('kd_supplier'); ?></div>
                </div>
                <div id="detail_supplier">

                </div>
            </form>
            <div class="cleaner_h20"></div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
</div>

</section><!-- /.content -->



<!-- ============ MODAL ADD PENJUALAN BARANG =============== -->
<div id="modalAddPembelianBarang"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="false">
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
                    <button type="submit" disabled="disabled" class="btn btn-primary" disabled="disabled" id="add" name="add">Simpan</button>
                    <button class="btn" data-dismiss="modal" id="closemodal"  aria-hidden="true">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$("#kd_supplier").change(function(){
    var kd_supplier = $("#kd_supplier").val();
    $.ajax({
        type: "POST",
        url : "<?php echo base_url('pembelian/get_detail_supplier'); ?>",
        data: "kd_supplier="+kd_supplier,
        cache:false,
        success: function(data){
            $('#detail_supplier').html(data);
    $('#form-add-order').find('#add').attr('disabled', 'disabled');
        }
    });
});

$('#closemodal').on('click', function(event) {
    event.preventDefault();
    $(this).closest('#form-add-order').find('#kd_barang').val('');
    $(this).closest('#form-add-order').find('#nama_barang').val('');
    $(this).closest('#form-add-order').find('#brand').val('');
    $(this).closest('#form-add-order').find('#qty').val('');
    $(this).closest('#form-add-order').find('#harga_beli').val('');
    $(this).closest('#form-add-order').find('#kd_barang_add').val('').trigger("chosen:updated");
    $('#detail_barang').html('');
    $('#form-add-order').find('#add').attr('disabled', 'disabled');
});

$("#kd_barang_add").change(function(){
    var kd_barang = $("#kd_barang_add").val();
    $.ajax({
        type: "POST",
        url : "<?php echo base_url('pembelian/get_detail_barang'); ?>",
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
    var brand = $(this).closest('#form-add-order').find('#brand').val();
    var harga_beli = $(this).closest('#form-add-order').find('#harga_beli').val();
    var qty = $(this).closest('#form-add-order').find('#qty').val();
    var subtotal = harga_beli*qty;
    var total = $('#total').val();
    total = Number(total)+Number(subtotal);

    if (qty) {
        $row = $('<tr class="gradeX"></tr>');
        $tdKode = $('<td>'+kd_barang+'<input type="hidden" class="form-control flat" name="kd_barang[]" readonly value="'+kd_barang+'"></td>');
        $tdNama = $('<td>'+nama_barang+'</td>');
        $tdBrand = $('<td>'+brand+'</td>');
        $tdQty = $('<td>'+qty+'<input type="hidden" class="form-control flat" name="qty[]" value="'+qty+'"></td>');
        $tdHrgBeli = $('<td>'+harga_beli+'<input type="hidden" class="form-control flat" name="harga_beli[]" readonly value="'+harga_beli+'"> <input id="update_harga" type="checkbox" name="update_harga[]" value="1"> <small>Update Harga</small></td>');
        $tdSubTotal = $('<td>'+subtotal+'<input type="hidden" class="form-control flat" name="subtotal[]" readonly value="'+subtotal+'"></td>');
        $tdDelbutton = $('<td style="text-align:center; width:150px;" ><a class="btn btn-default flat delbutton"><i class="fa fa-trash fa-fw"></i> Delete</a></td>');

        $row.append($tdKode).append($tdNama).append($tdBrand).append($tdQty).append($tdHrgBeli).append($tdSubTotal).append($tdDelbutton);
        $row.appendTo('tbody');
        $('#total').val(total);
        $('#total-label').html(total);
    };

    $(this).closest('#form-add-order').find('#kd_barang').val('');
    $(this).closest('#form-add-order').find('#nama_barang').val('');
    $(this).closest('#form-add-order').find('#brand').val('');
    $(this).closest('#form-add-order').find('#qty').val('');
    $(this).closest('#form-add-order').find('#harga_beli').val('');
    $(this).closest('#form-add-order').find('#kd_barang_add').val('').trigger("chosen:updated");
    $('#detail_barang').html('');
    $('#form-add-order').find('#add').attr('disabled', 'disabled');
    $(this).closest('#modalAddPembelianBarang').modal('hide');
    $('#submit').removeAttr('disabled');

    $(".delbutton").on('click', function(event) {
        event.preventDefault();
        $(this).closest('tr.gradeX').remove();var all_sub_total = $('.subtotal');
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


    </script>