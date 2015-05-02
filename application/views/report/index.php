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
                                    <th>Nama Barang</th>
                                    <th >Kategori</th>
                                    <th >Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                /*
                                foreach ($data_for_sales as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->kategori." ".$value->type; ?></td>
                                        <td><?php echo $value->kategori; ?></td>
                                        <td><?php echo $value->type; ?></td>
                                    </tr>
                                    <?php
                                }
                                */
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Type</th>
                                </tr>
                            </tfoot>
                        </table>


<div class="box-button">
    <div class="row">
        <div class="col-md-12">
            <h4>Laporan Barang Keluar</h4>
        </div>
    </div>
    <div class="cleaner_h3"></div>
</div>
                        <div class="cleaner_h3"></div>
                       
                           <table class="dataTableReport table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th >Kategori</th>
                                    <th >Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                /*
                                foreach ($data_for_sales as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->kategori." ".$value->type; ?></td>
                                        <td><?php echo $value->kategori; ?></td>
                                        <td><?php echo $value->type; ?></td>
                                    </tr>
                                    <?php
                                }
                                */
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Type</th>
                                </tr>
                            </tfoot>
                        </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>

</section><!-- /.content -->