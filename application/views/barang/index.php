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
                    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 4 ) {
                      ?>
                      <a href="<?php echo base_url('barang/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
                      <a href="<?php echo base_url('stok_opname')?>" class="btn btn-default flat"><i class="fa fa-cubes fa-fw"></i> Stok Opname</a>
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
              <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
                ?>
                <div class="row">
                  <div class="col-md-12">
                    <h3>Total Stok Barang : <?php echo $total_stok;?></h3>
                    <h3>Total Value : <?php echo $total_value;?></h3>
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
                      <th>Stok</th>
                      <th class="none">Modal</th>
                      <th class="none">Harga</th>
                      <th >Value</th>
                      <th class="none">Posisi</th>
                      <th class="none">Keterangan</th>
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
                      <th>Value</th>
                      <th>Posisi</th>
                      <th>Keterangan</th>
                      <th style="text-align:center;">Action</th>
                    </tr>
                  </tfoot>
                </table>
                <?php
              }elseif ($this->session->userdata('level') == 3 || $this->session->userdata('level') == 4) {
               ?>
                <div class="row">
                  <div class="col-md-12">
                    <h3>Total Stok Barang : <?php echo $total_stok['total_stok']; ?></h3>
                  </div>
                </div>
                <div class="cleaner_h3"></div>
                <table id="dataTableBarangAdmin" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="desktop">Kode Barang</th>
                      <th>Nama Barang</th>
                      <th class="min-tablet-l">Kategori</th>
                      <th class="min-tablet-l">Type</th>
                      <th class="desktop">Brand</th>
                      <th class="none">Minimum</th>
                      <th>Stok</th>
                      <th class="none">Harga</th>
                      <th class="none">Posisi</th>
                      <th class="none">Keterangan</th>
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
                      <th>Harga</th>
                      <th>Posisi</th>
                      <th>Keterangan</th>
                      <th style="text-align:center;">Action</th>
                    </tr>
                  </tfoot>
                </table>
                <?php
              }elseif ($this->session->userdata('level') == 6) {
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
            }else if ($this->session->userdata('level') == 5) {
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


  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>"></script>
  <script type="text/javascript" src="//cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.js"></script>

  <script type="text/javascript">

  $("#dataTableBarang").DataTable({
    responsive: true,
    "aoColumnDefs": [
    { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
    ], 
    "ajax": "<?php echo base_url('barang/getBarang')?>",
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
        { "data": "kategori" },
        { "data": "type" },
        { "data": "brand" },
        { "data": "min_stok" },
        { "data": "stok" },
        { "data": "modal" },
        { "data": "harga" },
        { "data": "value" },
        { "data": "posisi" },
        { "data": "keterangan" },
        { "data": "action" }
        ]
      });

  $("#dataTableBarangAdmin").DataTable({
    responsive: true,
    "aoColumnDefs": [
    { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
    ], 
    "ajax": "<?php echo base_url('barang/getBarang')?>",
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
        { "data": "kategori" },
        { "data": "type" },
        { "data": "brand" },
        { "data": "min_stok" },
        { "data": "stok" },
        { "data": "harga" },
        { "data": "posisi" },
        { "data": "keterangan" },
        { "data": "action" }
        ]
      });

    $("#dataTableBarangSales").DataTable({
      responsive: true,
      "aoColumnDefs": [
      { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
      ], 
      "ajax": "<?php echo base_url('barang/getBarangSales')?>",
      "deferRender": true,
      "columns": [
      { "data": "nama_barang" },
      { "data": "kategori" },
      { "data": "type" }
      ]
    });

    $("#dataTableBarangGudang").DataTable({
      responsive: true,
      "aoColumnDefs": [
      { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
      ], 
      "ajax": "<?php echo base_url('barang/getBarangGudang')?>",
      "deferRender": true,
      "columns": [
      { "data": "kd_barang" },
      { "data": "nama_barang" },
      { "data": "posisi" }
      ]
    });
    
    </script>