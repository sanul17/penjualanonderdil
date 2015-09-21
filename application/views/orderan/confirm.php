    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Orderan
            <small>Confirm Orderan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('orderan')?>">Orderan</a></li>
            <li class="active"><a href="<?php echo base_url('orderan/confirm/'.$kd_order)?>">Confirm Orderan</a></li>
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
                                    <h4>Header Penjualan</h4>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                        <form class="form-horizontal" method="post" name="form-confirm" role="form" action="<?php echo base_url('orderan/confirm/'.$kd_order); ?>">
                            <div class="row">
                                <div class="col-md-5">
                                    <?php
                                    if (form_error('kd_penjualan')) {
                                        echo '<div class="form-group has-error">';
                                    }else{
                                        echo '<div class="form-group">';
                                    }
                                    ?>
                                    <label for="kd_penjualan" class="col-md-6 control-label">Kode Penjualan</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control flat" id="kd_penjualan" name="kd_penjualan" value='<?php echo $kd_penjualan; ?>' readonly>
                                    </div>
                                    <div class="col-md-4"><?php echo form_error('kd_penjualan'); ?></div>
                                </div>

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

            <div class="form-group">
                <label for="tgl_pengiriman" class="col-md-6 control-label">Tgl Pengiriman</label>
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" class="form-control btn-flat datepicker" id="tgl_pengiriman" name="tgl_pengiriman" value='<?php echo set_value('tgl_pengiriman'); ?>'><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>

                        <?php
                        if (form_error('potongan')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="potongan" class="col-md-6 control-label pull-left">Potongan</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control flat" id="potongan" name="potongan" value='<?php echo $potongan; ?>' readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('potongan'); ?></div>
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
                <label for="alamat" class="col-md-4 control-label">Alamat</label>
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

        <?php
        if (form_error('kd_user')) {
            echo '<div class="form-group has-error">';
        }else{
            echo '<div class="form-group">';
        }
        ?>
        <label for="kd_user" class="col-md-4 control-label pull-left">Kode User</label>
        <div class="col-md-4">
            <input type="text" class="form-control flat" id="kd_user" name="kd_user" value='<?php echo $this->session->userdata('kd_user'); ?>' readonly>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control flat" id="nama" name="nama" value='<?php echo $this->session->userdata('nama'); ?>' readonly>
        </div>
        <div class="col-md-4"><?php echo form_error('kd_user'); ?></div>
    </div>
</div>
</div>
<hr>        
<div class="box-button">
    <div class="row">
        <div class="col-md-12">
            <h4>Detail Orderan</h4>
        </div>
    </div>
    <div class="cleaner_h3"></div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="box-body table-responsive">
            <div class="cleaner_h3"></div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th style="width:90px;">Orderan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_order_confirm as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value->kategori.' '.$value->type; ?></td>
                            <td><?php echo $value->qty; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
</div>     
<div class="box-button">
    <div class="row">
        <div class="col-md-12">
            <h4>Detail Penjualan</h4>
        </div>
    </div>
    <div class="cleaner_h3"></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-body table-responsive detail-penjualan">
            <div class="cleaner_h3"></div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width:14%;">Nama Barang</th>
                        <th style="width:14%;">Brand</th>
                        <th style="width:11%;">Kode Barang</th>
                        <th style="width:9%;">Qty</th>
                        <th style="width:9%;">Harga</th>
                        <th style="width:7%;">Potongan</th>
                        <th style="width:9%;">Hrg * Pot</th>
                        <th style="width:11%;">SubTotal</th>
                        <th style="width:8%;">Dus</th> 
                        <th style="text-align:center; width:10%;"  class="action"><a href="#modalAddPenjualanBarang" data-toggle="modal" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> Add Barang</a></th>

                    </thead>
                    <tbody class="barang-confirm">
                        <?php
                        foreach ($data_order_confirm as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td class="nama-barang-col"><?php echo $value->kategori.' '.$value->type; ?></td>
                                <td class="brand-col">
                                    <select class="form-control flat brand" id="brand" name="brand[]">
                                        <option value="none">--- SELECT ---</option>
                                        <?php
                                        foreach($data_barang as $key2 => $value_2) {
                                            if ($value->id_tipe_kategori == $value_2->id_tipe_kategori) {
                                                echo "<option value='".$value_2->kd_barang."'>".$value_2->brand."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td class="kd-barang-col"> - </td>
                                <td class="qty-col"> - </td>
                                <td class="harga-col"> - </td>
                                <td class="potongan-col"> - </td>
                                <td class="harga-potongan-col"> - </td>
                                <td class="subtotal-col"> - </td>
                                <td class="dus-col"> - </td>
                                <td class="delbutton-col" style="text-align:center;" ><a class="btn btn-default flat delbutton"><i class="fa fa-trash fa-fw"></i> Delete</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="gradeX">
                            <td colspan="7">Total</td>
                            <td><input type="text" class="form-control flat" id="total" name="total" readonly></td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="cleaner_h20"></div>
    <div class="form-group">
        <div class="col-sm-7">
            <button type="submit" class="btn btn-primary flat"  disabled="disabled" id="btnsimpan" name="submit" >Confirm</button>
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
                        <label for="barang" class="col-md-3 control-label">List Barang</label>
                        <div class="col-md-6">
                            <select id="barang_add" class="chzn-select form-control flat" name="barang" data-placeholder="Pilih Barang">
                                <option value=""></option>
                                <?php
                                if(count($data_barang_kategori) > 0){
                                    foreach($data_barang_kategori as $key => $value){
                                        ?>
                                        <option value="<?php echo $value->id_tipe_kategori?>"><?php echo $value->kategori." ".$value->type?></option>
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
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
});
   
function bolehUbah()
{
    document.getElementById("hargabarang").readOnly=false;
} 

(function( $ ){
   $.fn.cekBarangExist = function() {
      var n = $('.barang-confirm').find('.kd_barang').length;

      if (n<= 0) {
        $('#btnsimpan').attr('disabled', 'disabled');
      }else{
        $('#btnsimpan').removeAttr('disabled')
      }
   }; 
})( jQuery );

$(document).on("click", ".delbutton", function(event) {
    event.preventDefault();
    $(this).closest('tr.gradeX').remove();
});

    $(document).on('keyup keydown change', '.qty-dikirim', function(event) {
        var qty_dikirim = $(this).val();
        var harga = $(this).closest('.gradeX').find('.harga').val();
        var potongan = $(this).closest('.gradeX').find('.potongan').val();
        var harga_potongan = $(this).closest('.gradeX').find('.harga-potongan');
        var potongan_val = 0;
        var subtotal_val = 0;
        var subtotal =  $(this).closest('.gradeX').find('.subtotal');
        var total = $('#total');
        if (qty_dikirim != 0) {
            potongan_val = (potongan/100)*harga;
            harga = harga-potongan_val;
            harga_potongan.val(harga);
            subtotal_val = (harga*qty_dikirim);
            subtotal =  $(this).closest('.gradeX').find('.subtotal');
            subtotal.val(subtotal_val);
        };
        subtotal.val(subtotal_val); 
        var total_val = 0; 
        var all_sub_total = $('.subtotal');
        for (var i = 0; i < all_sub_total.length; i++) {
            total_val += Number(all_sub_total[i].value);
        };
        total.val(total_val);

    });

    $(document).on('keyup keydown change', '.potongan', function(event) {
        var potongan = $(this).val();
        var harga = $(this).closest('.gradeX').find('.harga').val();
        var harga_potongan = $(this).closest('.gradeX').find('.harga-potongan');
        var qty_dikirim = $(this).closest('.gradeX').find('.qty-dikirim').val();
        var potongan_val = 0;
        var subtotal_val = 0;
        var subtotal =  $(this).closest('.gradeX').find('.subtotal');
        var total = $('#total');
        if (qty_dikirim != 0) {
            potongan_val = (potongan/100)*harga;
            harga = harga-potongan_val;
            harga_potongan.val(harga);
            subtotal_val = (harga*qty_dikirim);
            subtotal =  $(this).closest('.gradeX').find('.subtotal');
            subtotal.html(subtotal_val);
        };
        subtotal.val(subtotal_val); 
        var total_val = 0; 
        var all_sub_total = $('.subtotal');
        for (var i = 0; i < all_sub_total.length; i++) {
            total_val += Number(all_sub_total[i].value);
        };
        total.val(total_val);

    });

    $(document).on('keyup keydown change', '.harga', function(event) {
        var harga = $(this).val();
        var potongan = $(this).closest('.gradeX').find('.potongan').val();
        var harga_potongan = $(this).closest('.gradeX').find('.harga-potongan');
        var qty_dikirim = $(this).closest('.gradeX').find('.qty-dikirim').val();
        var potongan_val = 0;
        var subtotal_val = 0;
        var subtotal =  $(this).closest('.gradeX').find('.subtotal');
        var total = $('#total');
        if (qty_dikirim != 0) {
            potongan_val = (potongan/100)*harga;
            harga = harga-potongan_val;
            harga_potongan.val(harga);
            subtotal_val = (harga*qty_dikirim);
            subtotal =  $(this).closest('.gradeX').find('.subtotal');
            subtotal.html(subtotal_val);
        };
        subtotal.val(subtotal_val); 
        var total_val = 0; 
        var all_sub_total = $('.subtotal');
        for (var i = 0; i < all_sub_total.length; i++) {
            total_val += Number(all_sub_total[i].value);
        };
        total.val(total_val);

    });


    $('#closemodal').on('click', function(event) {
        event.preventDefault();
        $(this).closest('#form-add-order').find('#nama_barang').val('');
        $(this).closest('#form-add-order').find('#qty').val('');
        $(this).closest('#form-add-order').find('#barang_add').val('').trigger("chosen:updated");
        $('#detail_barang').html('');
        $('#form-add-order').find('#add').attr('disabled', 'disabled');
    });

    $("#barang_add").change(function(){
        var barang = $("#barang_add").val();
        var req = "confirm";
        $.ajax({
            type: "POST",
            url : "<?php echo base_url('orderan/get_detail_barang'); ?>",
            data: {"barang":barang, "req":req},
            cache:false,
            success: function(data){
                $('#detail_barang').html(data);
                $('#form-add-order').find('#add').removeAttr('disabled');
            }
        });
    });

    $("#add").on('click', function(event) {
        event.preventDefault();
        var id_tipe_kategori = $(this).closest('#form-add-order').find('#id_tipe_kategori').val();
        var nama_barang = $(this).closest('#form-add-order').find('#nama_barang').val();

        $.ajax({
            url: '<?php echo base_url("orderan/get_brand"); ?>',
            type: 'POST',
            dataType: 'json',
            data: "id_tipe_kategori="+id_tipe_kategori,
        })
        .done(function(data) {
            $tdBrandSelect = $('<select class="form-control flat brand" id="brand" name="brand[]"><option value="none">--- SELECT ---</option></select>');

            $.each(data, function(index, val) {
                $tdBrandSelect.append($("<option value="+val.kd_barang+">" + val.brand  + "</option>"));
            });

            if (id_tipe_kategori) {
                $row = $('<tr class="gradeX"></tr>');
                $tdNama = $('<td class="nama-barang-col"><input type="hidden" readonly class="form-control flat id_tipe_kategori" name="id_tipe_kategori[]" value="'+id_tipe_kategori+'">'+nama_barang+'</td>');
                $tdDelbutton = $('<td class="delbutton-col" style="text-align:center;" ><a class="btn btn-default flat delbutton"><i class="fa fa-trash fa-fw"></i> Delete</a></td>');
                $tdBrand = $('<td class="brand-col"></td>');
                $tdBrandSelect.appendTo($tdBrand);
                $tdKdBarang = $('<td class="kd-barang-col"> - </td>');
                $tdHarga = $('<td class="harga-col"> - </td>');
                $tdQty = $('<td class="qty-col"> - </td>');
                $tdPotongan = $('<td class="potongan-col"> - </td>');
                $tdHargaPotongan = $('<td class="harga-potongan-col"> - </td>');
                $tdSubTotal = $('<td class="subtotal-col"> - </td>');
                $tdDus = $('<td class="dus-col"> - </td>');

                $row.append($tdNama).append($tdBrand).append($tdKdBarang).append($tdQty).append($tdHarga).append($tdPotongan).append($tdHargaPotongan).append($tdSubTotal).append($tdDus).append($tdDelbutton);
                $row.appendTo('tbody.barang-confirm');
            };
            console.log("add row success");
        })
    .fail(function() {
        console.log("add row error");
    })
    .always(function() {
        console.log("add row complete");
    });


    $(this).closest('#form-add-order').find('#nama_barang').val('');
    $(this).closest('#form-add-order').find('#qty').val('');
    $(this).closest('#form-add-order').find('#barang_add').val('').trigger("chosen:updated");
    $('#detail_barang').html('');
    $('#form-add-order').find('#add').attr('disabled', 'disabled');
    $(this).closest('#modalAddPenjualanBarang').modal('hide');
    $('#submit').removeAttr('disabled');

});

$(document).on("change", ".brand", function(event) {
    event.preventDefault();
    var kd_barang = $(this).val();
    var $kd_barang_col = $(this).closest('.gradeX').find(".kd-barang-col");
    var $qty_col = $(this).closest('.gradeX').find(".qty-col");
    var $harga_col = $(this).closest('.gradeX').find(".harga-col");
    var $potongan_col = $(this).closest('.gradeX').find(".potongan-col");
    var $harga_potongan_col = $(this).closest('.gradeX').find(".harga-potongan-col");
    var $subtotal_col = $(this).closest('.gradeX').find(".subtotal-col");
    var $dus_col = $(this).closest('.gradeX').find(".dus-col");
    var total = $("#total");

    if (kd_barang != "none") {

        var $kd_input = $('<input type="text" readonly class="form-control kd_barang" name="kd_barang[]">');
        var $tdQtySelect = $('<select class="form-control flat qty-dikirim" name="qty_dikirim[]"></select>');
        var $harga_input = $('<input type="text" class="form-control harga" name="harga[]">');
        var $harga_potongan_input = $('<input type="text" readonly class="form-control harga-potongan" name="harga_potongan[]">');
        var $pot_input = $('<input type="text" class="form-control potongan" name="potongan[]" value="0">');
        var $subtotal_input = $('<input type="text" readonly class="form-control subtotal" name="subtotal[]">');
        var $dus_input = $('<input type="text" class="form-control dus" name="dus[]">');

        $.ajax({
            url: "<?php echo base_url('orderan/get_detail_brand'); ?>",
            type: 'POST',
            dataType: 'json',
            data: "kd_barang="+kd_barang,
        })
        .done(function(data) {
            console.log("get detail brand success");
            $kd_input.val(data.kd_barang);
            for (var i = 1; i <= data.stok; i++) {
                $tdQtySelect.append('<option value="'+i+'">' + i + '</option>');
            };
            $harga_input.val(data.harga);
            $harga_potongan_input.val(data.harga);
            $subtotal_input.val(data.harga);

            $kd_barang_col.html($kd_input);
            $qty_col.html($tdQtySelect);
            $harga_col.html($harga_input);
            $potongan_col.html($pot_input);
            $harga_potongan_col.html($harga_potongan_input);
            $subtotal_col.html($subtotal_input);
            $dus_col.html($dus_input);
        })
        .fail(function() {
            console.log("get detail brand error");
        })
        .always(function() {
            console.log("get detail brand complete");

            var total_val = 0; 
            var all_sub_total = $('.subtotal');
            for (var i = 0; i < all_sub_total.length; i++) {
                total_val += Number(all_sub_total[i].value);
            };
            total.val(total_val);
            $(document).cekBarangExist();
        });
    } else{
        $kd_barang_col.html(' - ');
        $qty_col.html(' - ');
        $harga_col.html(' - ');
        $potongan_col.html(' - ');
        $harga_potongan_col.html(' - ');
        $subtotal_col.html(' - ');
        $dus_col.html(' - ');
        $(document).cekBarangExist();
    }

});



    $(document).on('keyup keydown change', '.qty-dikirim', function(event) {
        var qty_dikirim = $(this).val();
        var harga = $(this).closest('.gradeX').find('.harga').val();
        var potongan = $(this).closest('.gradeX').find('.potongan').val();
        var harga_potongan = $(this).closest('.gradeX').find('.harga-potongan');
        var potongan_val = 0;
        var subtotal_val = 0;
        var subtotal =  $(this).closest('.gradeX').find('.subtotal');
        var total = $('#total');
        if (qty_dikirim != 0) {
            potongan_val = (potongan/100)*harga;
            harga = harga-potongan_val;
            harga_potongan.val(harga);
            subtotal_val = (harga*qty_dikirim);
            subtotal =  $(this).closest('.gradeX').find('.subtotal');
            subtotal.val(subtotal_val);
        };
        subtotal.val(subtotal_val); 
        var total_val = 0; 
        var all_sub_total = $('.subtotal');
        for (var i = 0; i < all_sub_total.length; i++) {
            total_val += Number(all_sub_total[i].value);
        };
        total.val(total_val);

    });

    $(document).on('keyup keydown change', '.potongan', function(event) {
        var potongan = $(this).val();
        var harga = $(this).closest('.gradeX').find('.harga').val();
        var harga_potongan = $(this).closest('.gradeX').find('.harga-potongan');
        var qty_dikirim = $(this).closest('.gradeX').find('.qty-dikirim').val();
        var potongan_val = 0;
        var subtotal_val = 0;
        var subtotal =  $(this).closest('.gradeX').find('.subtotal');
        var total = $('#total');
        if (qty_dikirim != 0) {
            potongan_val = (potongan/100)*harga;
            harga = harga-potongan_val;
            harga_potongan.val(harga);
            subtotal_val = (harga*qty_dikirim);
            subtotal =  $(this).closest('.gradeX').find('.subtotal');
            subtotal.html(subtotal_val);
        };
        subtotal.val(subtotal_val); 
        var total_val = 0; 
        var all_sub_total = $('.subtotal');
        for (var i = 0; i < all_sub_total.length; i++) {
            total_val += Number(all_sub_total[i].value);
        };
        total.val(total_val);

    });

    $(document).on('keyup keydown change', '.harga', function(event) {
        var harga = $(this).val();
        var potongan = $(this).closest('.gradeX').find('.potongan').val();
        var harga_potongan = $(this).closest('.gradeX').find('.harga-potongan');
        var qty_dikirim = $(this).closest('.gradeX').find('.qty-dikirim').val();
        var potongan_val = 0;
        var subtotal_val = 0;
        var subtotal =  $(this).closest('.gradeX').find('.subtotal');
        var total = $('#total');
        if (qty_dikirim != 0) {
            potongan_val = (potongan/100)*harga;
            harga = harga-potongan_val;
            harga_potongan.val(harga);
            subtotal_val = (harga*qty_dikirim);
            subtotal =  $(this).closest('.gradeX').find('.subtotal');
            subtotal.html(subtotal_val);
        };
        subtotal.val(subtotal_val); 
        var total_val = 0; 
        var all_sub_total = $('.subtotal');
        for (var i = 0; i < all_sub_total.length; i++) {
            total_val += Number(all_sub_total[i].value);
        };
        total.val(total_val);

    });

    </script>