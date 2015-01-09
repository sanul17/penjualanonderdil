    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master User
            <small>Update User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url('user')?>">User</a></li>
            <li class="active"><a href="<?php echo base_url('user/update/'.$kd_user)?>">Update User</a></li>
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
                                    <a href="<?php echo base_url('user');?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> List</a>
                                    <a href="<?php echo base_url('user/create')?>" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> New</a>
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
                                    echo '<div class="alert alert-info alert-dismissable"><i class="fa fa-info"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> '.$pesan.'</div>';
                                };
                                ?>
                            </div>
                        </div>
                        <div class="cleaner_h3"></div>
                        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url('user/update/'.$kd_user) ?>">

                            <?php
                            if (form_error('kd_user')) {
                                echo '<div class="form-group has-error">';
                            }else{
                                echo '<div class="form-group">';
                            }
                            ?>
                            <label for="kd_user" class="col-md-2 control-label">Kode User</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control flat" id="kd_user" name="kd_user" value='<?php echo $kd_user; ?>' readonly>
                            </div>
                            <div class="col-md-4"><?php echo form_error('kd_user'); ?></div>
                        </div>

                        <?php
                        if (form_error('nama_user')) {
                            echo '<div class="form-group has-error">';
                        }else{
                            echo '<div class="form-group">';
                        }
                        ?>
                        <label for="nama_user" class="col-md-2 control-label">Nama User</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control flat" id="nama_user" name="nama_user" value='<?php echo $nama_user; ?>'>
                        </div>
                        <div class="col-md-4"><?php echo form_error('nama_user'); ?></div>
                    </div>

                    <?php
                    if (form_error('username')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="username" class="col-md-2 control-label">Username</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control flat" id="username" name="username" value='<?php echo $username; ?>'>
                    </div>
                    <div class="col-md-4"><?php echo form_error('username'); ?></div>
                </div>

                <?php
                if (form_error('password')) {
                    echo '<div class="form-group has-error">';
                }else{
                    echo '<div class="form-group">';
                }
                ?>
                <label for="password" class="col-md-2 control-label">Password</label>
                <div class="col-md-2">
                    <input type="text" class="form-control flat" id="password" name="password" value='<?php echo $password; ?>'>
                </div>
                <div class="col-md-4"><?php echo form_error('password'); ?></div>
            </div>
            <?php 
            if ($level != 'owner') {
                ?>
                <?php
                if (form_error('level')) {
                    echo '<div class="form-group has-error">';
                }else{
                    echo '<div class="form-group">';
                }
                ?>
                <label for="level" class="col-md-2 control-label">Level User</label>
                <div class="col-md-2">
                    <select id="level" name="level" class="form-control flat">
                        <option value="admin" <?php if ($level == 'admin') { echo 'selected';} ?>>Admin</option>
                        <option value="gudang" <?php if ($level == 'gudang') { echo 'selected';} ?>>Gudang</option>
                        <option value="keuangan" <?php if ($level == 'keuangan') { echo 'selected';} ?>>Keuangan</option>
                    </select>
                </div>
                <div class="col-md-4"><?php echo form_error('level'); ?></div>
            </div>
            <?php
        }else{
            echo "<input type='hidden' id='level' name='level' value='".$level."'>";
        }
        ?>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-primary flat">Simpan</button>
                <button type="reset" class="btn btn-default flat">Reset</button>
            </div>
        </div>
    </form>
    <div class="cleaner_h20"></div>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>

                    </section><!-- /.content -->