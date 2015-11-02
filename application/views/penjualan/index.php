    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'owner') {
            ?>
            <h1>
                Transaksi Penjualan
                <small>List Penjualan</small>
            </h1>
            <?php
        }else{
            ?>
            <h1>
                List Penjualan
            </h1>
            <?php
        }
        ?>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('penjualan')?>">Penjualan</a></li>
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
                                    <a href="<?php echo base_url('penjualan/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> Penjualan Cash</a>
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
                                    <th width="100">Kode Penjualan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th width="80">Sales</th>
                                    <th width="150">Tanggal Jual</th>
                                    <th width="100">Total Barang</th>
                                    <th width="150">Total Harga</th>
                                    <th width="80">User</th>
                                    <th width="50">Jenis</th>
                                    <th style="text-align:center; width:80px;"  class="action">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Penjualan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Sales</th>
                                    <th>Tanggal Jual</th>
                                    <th>Total Barang</th>
                                    <th>Total Harga</th>
                                    <th>User</th>
                                    <th>Jenis</th>
                                    <th style="text-align:center;"  class="action">Action</th>
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
        "aoColumnDefs": [
        { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
        ],
        "order": [[ 4, "desc" ]], 
    "ajax": "<?php echo base_url('penjualan/getPenjualan')?>",
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
        { "data": "kd_penjualan" },
        { "data": "nama_pelanggan" },
        { "data": "alamat" },
        { "data": "nama_sales" },
        { "data": "tgl_penjualan" },
        { "data": "jumlah" },
        { "data": "total_harga" },
        { "data": "nama_user" },
        { "data": "jenis" },
        { "data": "action" }
        ]
    });    
    </script>