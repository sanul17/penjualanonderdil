    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'owner') {
            ?>
            <h1>
                Master Barang
                <small>List Barang</small>
            </h1>
            <?php
        }else{
            ?>
            <h1>
                List Barang
            </h1>
            <?php
        }
        ?>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('barang')?>">Barang</a></li>
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
                                    <a href="<?php echo base_url('barang');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                    <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'owner') {
                                        ?>
                                        <a href="<?php echo base_url('barang/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
                                        <?php
                                    }
                                    ?>
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
                                if(!empty($this->session->flashdata('pesan'))){
                                    echo '<div class="alert alert-info alert-dismissable"><i class="fa fa-info"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> '.$this->session->flashdata('pesan').'</div>';
                                };
                                ?>
                            </div>
                        </div>
                        <div class="cleaner_h3"></div>
                        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'owner') {
                            ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Total Stok Barang : <?php echo $total_stok['total_stok']; ?></h3>
                            </div>
                        </div>
                        <div class="cleaner_h3"></div>
                            <table id="dataTableBarang" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="desktop">Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th class="min-tablet-l">Kategori</th>
                                        <th class="min-tablet-l">Type</th>
                                        <th class="desktop">Brand</th>
                                        <th class="none">Minimum</th>
                                        <th class="none">Stok</th>
                                        <th class="none">Modal</th>
                                        <th class="none">Harga</th>
                                        <th class="none">Posisi</th>
                                        <th style="text-align:center;"  class="action desktop">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Type</th>
                                        <th>Brand</th>
                                        <th>Minimum</th>
                                        <th>Stok</th>
                                        <th>Modal</th>
                                        <th>Harga</th>
                                        <th>Posisi</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php
                        }elseif ($this->session->userdata('level') == 'sales') {
                           ?>
                           <table id="dataTableBarangSales" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Type</th>
                                </tr>
                            </tfoot>
                        </table>
                        <?php
                    }else if ($this->session->userdata('level') == 'gudang') {
                      ?>
                      <table id="dataTableBarangGudang" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Posisi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Posisi</th>
                            </tr>
                        </tfoot>
                    </table>
                    <?php
                }
                ?>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>

</section><!-- /.content -->

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="deleteLabel">Delete</h3>
            </div>
            <div class="modal-body">
                <h4>Barang ini akan dihapus, Anda Yakin?</h4>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default" data-dismiss="modal" aria-hidden="true" href="javascript:;">Tidak</a>
                <a class="btn btn-primary" id="deleteModalFunction" href="javascript:;">Ya</a>
            </div>
        </div>
    </div>
</div>
<script>
function deleteModalFunction(temp_id){
    $("#deleteModalFunction").attr("href","<?php echo base_url();?>barang/delete/"+temp_id);
}
</script>