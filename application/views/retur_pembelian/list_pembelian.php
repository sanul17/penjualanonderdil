    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'owner') {
            ?>
            <h1>
                Retur Pembelian
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
            <li class="active"><a href="<?php echo base_url('retur_pembelian')?>">Retur Pembelian</a></li>
            <li class="active"><a href="<?php echo base_url('retur_pembelian/list_pembelian')?>">List Pembelian</a></li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Pembelian</th>
                                    <th>Nama Supplier</th>
                                    <th>Tanggal Pembelian</th>
                                    <th >User</th>
                                    <th style="text-align:center; width:80px;"  class="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->kd_pembelian; ?></td>
                                        <td><?php echo $value->nama_supplier; ?></td>
                                        <td><?php echo gmdate('Y-m-d H:i:s', $value->tgl_pembelian); ?></td>
                                        <td><?php echo $value->nama_user; ?></td>
                                        <td><a href="<?php echo base_url('retur_pembelian/create/'.$value->kd_pembelian)?>" class="btn btn-default flat"><i class="fa fa-shopping-cart fa-fw"></i> Retur</a>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
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
       "aoColumnDefs": [
       { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
       ],
        "order": [[ 2, "desc" ]]
   });    
</script>