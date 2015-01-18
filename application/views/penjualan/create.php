    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Penjualan
            <small>Create Penjualan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('penjualan')?>">Penjualan</a></li>
            <li class="active"><a href="<?php echo base_url('penjualan/create')?>">Create Penjualan</a></li>
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
                                    <a href="<?php echo base_url('penjualan');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
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
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('penjualan/create') ?>">

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
                        if (form_error('kd_user')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="kd_user" class="col-md-2 control-label pull-left">User</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control flat" id="kd_user" name="kd_user" value='<?php echo $this->session->userdata('kd_user'); ?>' readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control flat" id="nama_user" name="nama_user" value='<?php echo $this->session->userdata('nama'); ?>' readonly>
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
                        <input type="text" class="form-control flat" id="nama_pelanggan" name="nama_pelanggan" value='<?php echo $this->session->userdata('nama_pelanggan'); ?>'>
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
                    <input type="text" class="form-control flat" id="alamat" name="alamat" value='<?php echo $this->session->userdata('alamat'); ?>'>
                </div>
                <div class="col-md-4"><?php echo form_error('alamat'); ?></div>
            </div>
            <hr>                        
            <div class="box-button">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Data Penjualan</h4>
                    </div>
                </div>
                <div class="cleaner_h3"></div>
            </div>
            <div class="box-body table-responsive">
                <div class="cleaner_h3"></div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:50px;">No</th>
                            <th style="width:120px;">Kode Barang</th>
                            <th>Nama Barang</th>
                            <th style="width:100px;">Quantity</th>
                            <th style="width:150px;">Harga</th>
                            <th style="width:50px;">Potongan</th>
                            <th style="width:80px;">Dus</th>
                            <th style="width:150px;">Sub Total</th>
                            <th style="text-align:center; width:150px;"  class="action"><a href="#modalAddPenjualanBarang" data-toggle="modal" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> Add Barang</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1; $no=1;
                        foreach ($this->cart->contents() as $items) {
                            echo form_hidden('rowid[]', $items['rowid']);
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $items['id']; ?></td>
                                <td><?php echo $items['name']; ?></td>
                                <td><input type="text" class="form-control flat qty" id="qty" name="qty[]" value="<?php echo $items['qty']; ?>" readonly></td>
                                <td><input type="text" class="form-control flat harga" id="harga" name="harga[]" value="<?php echo $items['price']; ?>" readonly></td>
                                <td><input type="text" class="form-control flat potongan" id="potongan" name="potongan[]" value="0"></td>
                                <td><input type="text" class="form-control flat" id="dus" name="dus[]"></td>
                                <td><input type="text" class="form-control flat subtotal" id="subtotal" name="subtotal" readonly></td>
                                <td style="text-align:center;">
                                    <a href="#" class="btn btn-default flat delbutton" id="<?php echo 'create/'.$items['rowid'].'/'.$kd_penjualan.'/'.$items['id'].'/'.$items['qty']; ?>"><i class="fa fa-trash fa-fw"></i> Delete</a>
                                </td>
                            </tr>
                            <?php
                            $i++; $no++;
                        }
                        ?>

                    </tbody>
                    <tfoot>
                        <tr class="gradeX">
                            <td colspan="7">Total</td>
                            <td><input type="text" class="form-control flat" id="total" name="total" readonly></td>
                            <td style="text-align:center;" colspan="7"> - </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="cleaner_h20"></div>
                <div class="form-group">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary flat" id="btnsimpan" disabled>Jual Cash</button>
                        <a href="<?php echo base_url('penjualan');?>" class="btn btn-default flat">Cancel</a>
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
            <form class="form-horizontal" id="form-add-order" method="post" role="form"  action="<?php echo base_url ('penjualan/add_to_cart')?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kd_barang" class="col-md-3 control-label">List Barang</label>
                        <div class="col-md-6">
                            <input type="hidden" name="create_or_update"  value="create">
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
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$('#nama_pelanggan').change(function(event) {
    var kd_user = $('#kd_user').val();
    var nama_pelanggan = $(this).val();
    var alamat = $('#alamat').val();
    $.ajax({
        url : "<?php echo base_url('penjualan/set_session_pemesan'); ?>",
        type: 'POST',
        data: { kd_user: kd_user, nama_pelanggan:  nama_pelanggan, alamat: alamat },
        cache:false,
    });   
});

$('#alamat').change(function(event) {
    var kd_user = $('#kd_user').val();
    var nama_pelanggan = $('#nama_pelanggan').val();
    var alamat = $(this).val();
    $.ajax({
        url : "<?php echo base_url('penjualan/set_session_pemesan'); ?>",
        type: 'POST',
        data: { kd_user: kd_user, nama_pelanggan:  nama_pelanggan, alamat: alamat },
        cache:false,
    });   
});

$("#kd_barang_add").change(function(){
    var kd_barang = $("#kd_barang_add").val();
    $.ajax({
        type: "POST",
        url : "<?php echo base_url('penjualan/get_detail_barang'); ?>",
        data: "kd_barang="+kd_barang,
        cache:false,
        success: function(data){
            $('#detail_barang').html(data);
            $('#form-add-order').find('#add').removeAttr('disabled');
        }
    });
});


$(".delbutton").click(function(){
    var element = $(this);
    var del_id = element.attr("id");
    var info = del_id;
    if(confirm("Anda yakin akan menghapus?"))
    {
        $.ajax({
            url: "<?php echo base_url(); ?>penjualan/remove_from_cart",
            data: "kode="+info,
            cache: false,
            success: function(){
            }
        });
        $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
    }
    return false;
});

$('.potongan').change(function(event) {
    var potongan = $(this).val();
    var harga = $(this).closest('.gradeX').find('.harga').val();
    var qty = $(this).closest('.gradeX').find('.qty').val();
    var potongan_val = 0;
    var subtotal_val = 0;
    var subtotal =  $(this).closest('.gradeX').find('.subtotal');
    var total = $('#total');
    if (qty != 0) {
        potongan_val = (potongan/100)*harga;
        harga = harga-potongan_val;
        subtotal_val = (harga*qty);
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

    $('#btnsimpan').removeAttr('disabled');
});

</script>