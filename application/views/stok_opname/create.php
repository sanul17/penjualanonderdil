    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Stok Opname
        <small>Create</small>
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
                                    <a href="<?php echo base_url('stok_opname')?>" class="btn btn-default flat"><i class="fa fa-cubes fa-fw"></i> Stok Opname</a>
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
                        <form class="form-horizontal" id="create-cash" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('stok_opname/create') ?>">

                                <input type="hidden" class="form-control flat" id="kd_opname" name="kd_opname" value='<?php echo $kd_opname; ?>' readonly>
                            <div class="form-group">
                                <label for="kd_barang" class="col-md-1 control-label">List Barang</label>
                                <div class="col-md-4">
                                    <select id="kd_barang_add" class="chzn-select form-control flat" multiple name="kd_barang" data-placeholder="Pilih Barang">
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
                            <div class="form-group">

                                <div class="col-md-2 col-md-offset-1">
                                    <button  class="btn btn-primary" id="add" name="add">Add</button>
                                </div>
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
                                            <th style="width:150px;">Action</th>
                                            <!-- <th style="width:150px;">Selisih</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <div class="cleaner_h20"></div>
                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary flat" id="submit" disabled>Submit</button>
                                        <a href="<?php echo base_url('stok_opname');?>" class="btn btn-default flat">Cancel</a>
                                    </div>
                                </div>
                            </form>
                            <div class="cleaner_h20"></div>
                        </div><!-- /.box-body -->

                    </form>
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

function check(){
    var kd_exist = $('.kd_barang');
    console.log(kd_exist);
    if (kd_exist.length <= 0) {
        $('#submit').attr('disabled', 'disabled');
    }else{
        $('#submit').removeAttr('disabled');
    }
}

$("#dataTable").DataTable({
    responsive: true,
    "aoColumnDefs": [
    { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
    ],
    "order": [[ 1, "desc" ]]
});    

$(document).on('click', "#add", function(event) {
    event.preventDefault();
    var kd_barang = $("#kd_barang_add").val();
//var jsonString = JSON.stringify(kd_barang);
    //console.log(kd_barang);
    //console.log(jsonString);
    if (kd_barang){
        $.ajax({
            url: "<?php echo base_url('stok_opname/getBarang');?>",
            type: 'POST',
            dataType: 'json',
            data: {kd_barang: kd_barang},
        })
        .done(function(data) {
            console.log(data);
            var kd_exist = $('.kd_barang');
        //console.log(kd_exist);
        $.each(data, function(index, val) {
            var exist = false;
            $.each(kd_exist, function(index_2, val_2) {
               if (val.kd_barang == val_2.value) {
                exist = true;
            };
        });
            if (!exist) {
                var row = $('<tr class="gradeX"></tr>');
                var tdKode = $('<td>'+val.kd_barang+'<input type="hidden" class="kd_barang form-control flat" name="kd_barang[]" readonly value="'+val.kd_barang+'"></td>');
                var tdNama = $('<td>'+val.nama_barang+'</td>');
                var tdBrand = $('<td>'+val.brand+'</td>');
                var tdStok = $('<td>'+val.stok+'<input type="hidden" class="form-control flat" name="stok_komp[]" value="'+val.stok+'"></td>');
                var tdStokFisik = $('<td><input type="text" class="form-control flat" name="stok_fisik[]" value="0"></td>');
                var $tdDelbutton = $('<td style="text-align:center; width:150px;" ><a class="btn btn-default flat delbutton"><i class="fa fa-trash fa-fw"></i> Delete</a></td>');
            //var tdSelisih = $('<td>''<input type="hidden" class="form-control flat" name="stok_komp[]" value="'+val.stok+'"></td>');
            row.append(tdKode).append(tdNama).append(tdBrand).append(tdStok).append(tdStokFisik).append($tdDelbutton);
            //row.append(tdKode).append(tdNama).append(tdBrand).append(tdStokFisik).append($tdDelbutton);
            row.appendTo('tbody');
        };
    });
    console.log("success");
})
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        check();
        console.log("complete");
    });
}
});


    $(document).on('click', '.delbutton', function(event) {
        event.preventDefault();
        $(this).closest('tr.gradeX').remove();var all_sub_total = $('.subtotal');
        check();
    });
    </script>