    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Barang
            <small>List Barang</small>
        </h1>
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
                                <a href="<?php echo base_url('barang/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
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
                                    echo '<div class="alert alert-info alert-dismissable"><i class="fa fa-info"></i> '.$pesan.'</div>';
                                };
                                ?>
                            </div>
                        </div>
                        <div class="cleaner_h3"></div>
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Brand</th>
                                    <th>Type</th>
                                    <th>Minimum</th>
                                    <th>Stok</th>
                                    <th>Modal</th>
                                    <th>Harga</th>
                                    <th>Posisi</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->kd_barang; ?></td>
                                        <td><?php echo $value->nama_barang; ?></td>
                                        <td><?php echo $value->kategori; ?></td>
                                        <td><?php echo $value->brand; ?></td>
                                        <td><?php echo $value->type; ?></td>
                                        <td><?php echo $value->min_stok; ?></td>
                                        <td><?php echo $value->stok; ?></td>
                                        <td><?php echo $value->modal; ?></td>
                                        <td><?php echo $value->harga; ?></td>
                                        <td><?php echo $value->posisi; ?></td>
                                        <td style="text-align:center;">
                                            <div class="btn-group">
                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                                                    Action
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo base_url('barang/update/'.$value->kd_barang);?>">Tambah Stok</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('barang/update/'.$value->kd_barang);?>">Update</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('barang/update/'.$value->kd_barang);?>">Detail</a>
                                                    </li>
                                                    <li>
                                                        <a href="#myModal" role="button" data-toggle="modal" onclick="myModalInsertInHere(<?php echo $value->kd_barang; ?>)">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Brand</th>
                                    <th>Type</th>
                                    <th>Minimum</th>
                                    <th>Stok</th>
                                    <th>Modal</th>
                                    <th>Harga</th>
                                    <th>Posisi</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

                                    </section><!-- /.content -->