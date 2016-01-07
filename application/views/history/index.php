    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Report
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('report')?>">Laporan</a></li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <div class="box-button">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Laporan Barang Masuk</h4>
                                </div>
                            </div>
                            <div class="cleaner_h3"></div>
                        </div>
                        <div class="cleaner_h3"></div>

                        <table class="dataTableReport table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal</th>
                                    <th>Barang Masuk</th>
                                    <th>Barang Keluar</th>
                                    <th>Type</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal</th>
                                    <th>Barang Masuk</th>
                                    <th>Barang Keluar</th>
                                    <th>Type</th>
                                    <th>User</th>
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
    
    $(".dataTableReport").DataTable({
        "order": [[ 2, "desc" ]],
        responsive: true,
        "aoColumnDefs": [
        { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
        ], 
        "ajax": "<?php echo base_url('history/getHistory')?>",
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
        { "data": "kd_barang" },
        { "data": "nama_barang" },
        { "data": "tgl_history" },
        { "data": "qty_masuk" },
        { "data": "qty_keluar" },
        { "data": "type_history" },
        { "data": "nama_user" }
        ]
    });

    </script>