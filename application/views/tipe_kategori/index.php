    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Tipe Kategori
            <small>List Tipe Kategori</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('tipe_kategori')?>">Tipe Kategori</a></li>
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
                                    <a href="<?php echo base_url('tipe_kategori');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                    <a href="<?php echo base_url('tipe_kategori/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
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
                        <table id="dataTableTipeKategori" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Type</th>
                                    <th style="text-align:center;"  class="action">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Type</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </tfoot>
                        </table>
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
                    <h4>Tipe Kategori ini akan dihapus, Anda Yakin?</h4>
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
        $("#deleteModalFunction").attr("href","<?php echo base_url();?>tipe_kategori/delete/"+temp_id);
    }
    </script>