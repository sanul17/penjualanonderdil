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
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('orderan/confirm/'.$kd_order) ?>">
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
</div>
<hr>        
<div class="box-button">
    <div class="row">
        <div class="col-md-12">
            <h4>Detail Penjualan</h4>
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
                <th style="width:50px;">Pesanan</th>
                <th style="width:100px;">Quantity</th>
                <th style="width:100px;">Harga</th>
                <th style="width:70px;">Pot %</th>
                <th style="width:70px;">Dus/Coli</th>
                <th style="width:110px;">Sub Total</th></tr>
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
                        <td><?php echo $items['qty']; ?></td>
                        <?php if ($this->cart->has_options($items['rowid']) == TRUE){ ?>

                        <td width="70">
                            <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value){
                                switch ($option_name) {
                                    case "qty_stok": 
                                    ?>
                                    <select name="qty_dikirim[]" class="form-control flat qty-dikirim">
                                        <?php
                                        for($j=0;$j<=$option_value;$j++)
                                        {
                                            echo "<option value='".$j."'>".$j."</option>";
                                        }   
                                        ?>
                                    </select>
                                    <?php 
                                    break;
                                }                               
                            }
                            ?>
                        </td>

                        <?php 
                    }
                    ?>
                    <td><input type="text" class="form-control flat harga" readonly name="harga[]" value="<?php echo $items['price']; ?>"/></td>
                    <td><input type="text" class="form-control flat potongan" id="potongan" name="potongan[]" value="0"></td>
                    <td><input type="text" class="form-control flat" id="dus" name="dus[]"></td>
                    <td><input type="text" class="form-control flat subtotal" id="subtotal" name="subtotal" readonly></td>
                </tr>
                <?php
                $i++; $no++;
            }
            ?>

        </tbody>
        <tfoot>
            <tr class="gradeX">
                <td colspan="8">Total</td>
                <td><input type="text" class="form-control flat" id="total" name="total" readonly></td>
            </tr>
        </tfoot>
    </table>
    <div class="cleaner_h20"></div>
    <div class="form-group">
        <div class="col-sm-8">
            <button type="submit" class="btn btn-primary flat" disabled="disabled" id="btnsimpan">Confirm</button>
            <button type="submit" class="btn bg-black flat" disabled="disabled" id="btnsimpancetak">Confirm and Print Faktur</button>
        </div>
    </div>
</form>
<div class="cleaner_h20"></div>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>

</section><!-- /.content -->

<script>
function bolehUbah()
{
    document.getElementById("hargabarang").readOnly=false;
}

$('.qty-dikirim').change(function(event) {
    var qty_dikirim = $(this).val();
    var harga = $(this).closest('.gradeX').find('.harga').val();
    var potongan = $(this).closest('.gradeX').find('.potongan').val();
    var potongan_val = 0;
    var subtotal_val = 0;
    var subtotal =  $(this).closest('.gradeX').find('.subtotal');
    var total = $('#total');
    if (qty_dikirim != 0) {
        potongan_val = (potongan/100)*harga;
        subtotal_val = (harga-potongan_val)*qty_dikirim;
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

    $('#btnsimpan').removeAttr('disabled');
    $('#btnsimpancetak').removeAttr('disabled');

});

$('.potongan').change(function(event) {
    var potongan = $(this).val();
    var harga = $(this).closest('.gradeX').find('.harga').val();
    var qty_dikirim = $(this).closest('.gradeX').find('.qty-dikirim').val();
    var potongan_val = 0;
    var subtotal_val = 0;
    var subtotal =  $(this).closest('.gradeX').find('.subtotal');
    var total = $('#total');
    if (qty_dikirim != 0) {
        potongan_val = (potongan/100)*harga;
        subtotal_val = (harga*qty_dikirim)-potongan_val;
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
    $('#btnsimpancetak').removeAttr('disabled');
});

$('#btnsimpancetak').on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
});
</script>