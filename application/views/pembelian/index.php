    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'owner') {
            ?>
            <h1>
                Transaksi Pembelian
                <small>List Pembelian</small>
            </h1>
            <?php
        }else{
            ?>
            <h1>
                List Pembelian
            </h1>
            <?php
        }
        ?>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('pembelian')?>">Pembelian</a></li>
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
                                    <a href="<?php echo base_url('pembelian/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> Pembelian</a>
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
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Pembelian</th>
                                    <th>Nama Supplier</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>User</th>
                                    <th style="text-align:center; width:80px;"  class="action">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Pembelian</th>
                                    <th>Nama Supplier</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>User</th>
                                    <th style="text-align:center; width:80px;"  class="action">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->

    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>"></script>
    <script type="text/javascript" src="//cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.js"></script>
    <script type="text/javascript">
    
    $("#dataTable").DataTable({
        responsive: true,
        "order": [[ 2, "desc" ]],
        "aoColumnDefs": [
        { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
        ],
        "order": [[ 4, "desc" ]], 
        "ajax": "<?php echo base_url('pembelian/getPembelian')?>",
        "deferRender": true,
       /*
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td class="bg-light-blue" colspan="11">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        },
        */
        "columns": [
        { "data": "kd_pembelian" },
        { "data": "nama_supplier" },
        { "data": "tgl_pembelian" },
        { "data": "nama_user" },
        { "data": "action" }
        ]
    });    
    </script>