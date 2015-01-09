    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Orderan
            <small>Update Orderan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('orderan')?>">Orderan</a></li>
            <li class="active"><a href="<?php echo base_url('orderan/update/'.$kd_order)?>">Update Orderan</a></li>
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
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('orderan/update/'.$kd_order) ?>">

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
                            <input type="text" class="form-control flat" id="kd_sales" name="kd_sales" value='<?php echo $this->session->userdata('kd_sales'); ?>' readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control flat" id="nama_sales" name="nama_sales" value='<?php echo $nama_sales; ?>' readonly>
                        </div>
                        <div class="col-md-4"><?php echo form_error('kd_sales'); ?></div>
                    </div>

                    <?php
                    if (form_error('username')) {
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
                                <th style="width:50px;">No</th>
                                <th style="width:120px;">Kode Barang</th>
                                <th>Nama Barang</th>
                                <th style="width:100px;">Quantity</th>
                                <th style="width:150px;">Harga</th>
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
                                    <td><?php echo $items['qty']; ?></td>
                                    <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                                    <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                    <td style="text-align:center;">
                                        <a href="#" class="btn btn-default flat delbutton" id="<?php echo 'update/'.$items['rowid'].'/'.$kd_order.'/'.$items['id'].'/'.$this->app_model->getSisaStok($items['id']).'/'.$items['qty']; ?>"><i class="fa fa-trash fa-fw"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php
                                $i++; $no++;
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr class="gradeX">
                                <td colspan="5">Total</td>
                                <td>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                <td style="text-align:center;"> - </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="cleaner_h20"></div>
                    <div class="form-group">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary flat">Add New Order</button>
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
            <form class="form-horizontal" id="form-add-order" method="post" role="form"  action="<?php echo base_url ('orderan/add_to_cart')?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kd_barang" class="col-md-3 control-label">List Barang</label>
                        <div class="col-md-6">
                            <input type="hidden" name="create_or_update" value="update">
                            <input type="hidden" name="kd_order" value="<?php echo $kd_order; ?>">
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
    var kd_sales = $('#kd_sales').val();
    var nama_pelanggan = $(this).val();
    $.ajax({
        url : "<?php echo base_url('orderan/set_session_pemesan'); ?>",
        type: 'POST',
        data: { kd_sales: kd_sales, nama_pelanggan:  nama_pelanggan },
        cache:false,
    });   
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


$(".delbutton").click(function(){
    var element = $(this);
    var del_id = element.attr("id");
    var info = del_id;
    if(confirm("Anda yakin akan menghapus?"))
    {
        $.ajax({
            url: "<?php echo base_url(); ?>orderan/remove_from_cart",
            data: "kode="+info,
            cache: false,
            success: function(){
            }
        });
        $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
    }
    return false;
});

</script>