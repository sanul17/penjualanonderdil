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
                        <table  id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:150px;">Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Brand</th>
                                    <th style="width:150px;">Stok</th>
                                    <th style="width:150px;">Stok Fisik</th>
                                    <th style="width:150px;">Selisih</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($barang_opname as $value) {
                                    ?>
                                    <tr id="<?php echo $value['kd_barang']; ?>">
                                        <td><?php echo $value['kd_barang']; ?><input type="hidden" class="kd_barang"  name="kd_barang[]" value="<?php echo $value['kd_barang']; ?>"></td>
                                        <td><?php echo $value['nama_barang']; ?><input type="hidden"  class="nama_barang" name="nama_barang[]" value="<?php echo $value['nama_barang']; ?>"></td>
                                        <td><?php echo $value['brand']; ?><input type="hidden"  class="brand" name="brand[]" value="<?php echo $value['brand']; ?>"></td>
                                        <td><?php echo $value['stok']; ?><input type="hidden"  class="stok_komp" name="stok_komp[]" value="<?php echo $value['stok']; ?>"></td>
                                        <td><span class="stok_fisik_label"><?php echo $value['stok_fisik']; ?></span><input type="hidden"  class="stok_fisik" name="stok_fisik[]" value="<?php echo $value['stok_fisik']; ?>"></td>
                                        <td><?php echo $value['selisih']; ?><input type="hidden" name="selisih[]" class="selisih" value="<?php echo $value['selisih']; ?>"></td>
                                        <td style="text-align:center;">
                                            <div class="btn-group">
                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                                                    Action
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="#" class="updateButton" role="button" data-id="<?php echo $value['kd_barang']; ?>">Update</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="deleteButton" role="button" data-id="<?php echo $value['kd_barang']; ?>">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
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

<div id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="deleteLabel">Update</h3>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" id="form-update-stok-fisik" method="post" role="form"  action="#">
                <div class="form-group">
                    <label for="kd_opname" class="col-md-4 control-label">Kode Barang</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control flat" id="kd_barang_update" name="kd_barang_update" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kd_opname" class="col-md-4 control-label">Nama Barang</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control flat" id="nama_barang_update" name="nama_barang_update" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kd_opname" class="col-md-4 control-label">Brand</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control flat" id="brand_update" name="brand_update" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kd_opname" class="col-md-4 control-label">Stok Fisik</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control flat" id="stok_fisik_update" name="stok_fisik_update" >
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default" data-dismiss="modal" aria-hidden="true" href="javascript:;">Cancel</a>
                <a class="btn btn-primary" id="updateYes">Update</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>"></script>
<script type="text/javascript" src="//cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.js"></script>
<script type="text/javascript">

var table = $("#dataTable").dataTable({
    responsive: true,
    "aoColumnDefs": [
    { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
    ],
    "order": [[ 0, "asc" ]]
});    
$(document).on('click', '.deleteButton', function(event) {
    event.preventDefault();
    var kd_barang = $(this).data('id');
    var tr = $(this).closest('tr');
    $.ajax({
        url: BASE_URL + '<?php echo "stok_opname/delete/".$kd_opname; ?>' + '/' + kd_barang,
    })
    .done(function(message) {
        alert(message);
        table.api().row(tr).remove().draw();
        console.log("success");
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
});
$(document).on('click', '.updateButton', function(event) {
    event.preventDefault();
    var kd_barang = $(this).closest('tr').find('.kd_barang').val();
    var brand = $(this).closest('tr').find('.brand').val();
    var nama_barang = $(this).closest('tr').find('.nama_barang').val();
    var stok_fisik = $(this).closest('tr').find('.stok_fisik').val();
/*
    console.log('kd_barang: ' + kd_barang);
    console.log('nama_barang: ' + nama_barang);
    console.log('brand: ' + brand);
    console.log('stok_fisik: ' + stok_fisik);
    console.log('----------------');
*/

$('#kd_barang_update').val(kd_barang);
$('#nama_barang_update').val(nama_barang);
$('#brand_update').val(brand);
$('#stok_fisik_update').val(stok_fisik);
$('#updateModal').modal('show');


});


$(document).on('click', '#updateYes', function(event) {  
    event.preventDefault();
    var kd_opname = '<?php echo $kd_opname; ?>'
    var kd_barang = $('#kd_barang_update').val();
    var stok_fisik = $('#stok_fisik_update').val();
    /*
    console.log('kd_opname: ' + kd_opname);
    console.log('kd_barang: ' + kd_barang);
    console.log('stok_fisik: ' + stok_fisik);
    console.log('----------------');
    */

    $.ajax({
        url: BASE_URL + '<?php echo "stok_opname/update/"; ?>',
        type: 'POST',
        data:{
            kd_barang: kd_barang,
            kd_opname: kd_opname,
            stok_fisik: stok_fisik

        }
    })
    .done(function(data) {
        alert(data.message);
        table.fnUpdate(data.stok_komp+'<input type="hidden"  class="stok_komp" name="stok_komp[]" value="'+data.stok_komp+'">' , $('tr#'+kd_barang)[0], 3 );
        table.fnUpdate('<span class="stok_fisik_label">'+data.stok_fisik+'</span><input type="hidden"  class="stok_fisik" name="stok_fisik[]" value="'+data.stok_fisik+'">' , $('tr#'+kd_barang)[0], 4 );
        table.fnUpdate(data.selisih+'<input type="hidden"  class="selisih" name="selisih[]" value="'+data.selisih+'">' , $('tr#'+kd_barang)[0], 5 );
$('#kd_barang_update').val('');
$('#nama_barang_update').val('');
$('#brand_update').val('');
$('#stok_fisik_update').val('');
$('#updateModal').modal('hide');
        console.log("success");
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });



});

</script>