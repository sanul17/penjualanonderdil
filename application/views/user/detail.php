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
                            <input type="text" class="form-control flat" id="nama_user" name="nama_user" value='<?php echo $nama_user; ?>' readonly>
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
                        <input type="text" class="form-control flat" id="username" name="username" value='<?php echo $username; ?>' readonly>
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
                    <input type="text" class="form-control flat" id="password" name="password" value='<?php echo $password; ?>' readonly>
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
                    <input type="text" class="form-control flat" id="level" name="level" value='<?php echo $level; ?>' readonly>
                </div>
                <div class="col-md-4"><?php echo form_error('level'); ?></div>
            </div>
            <?php
        }else{
            echo "<input type='hidden' id='level' name='level' value='".$level."'>";
        }
        ?>
    </form>
    <div class="cleaner_h10"></div>
    <div class="box-button">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo base_url('user/update/'.$kd_user);?>" class="btn btn-default flat"><i class="fa fa-list fa-fw"></i> Update</a>
                <a href="#deleteModal" class="btn btn-default flat" role="button" data-toggle="modal" onclick="deleteModalFunction('<?php echo $kd_user; ?>')"><i class="fa fa-trash fa-fw"></i> Delete</a>
            </div>
        </div>
        <div class="cleaner_h3"></div>
    </div>
    <div class="cleaner_h20"></div>
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
                    <h4>user ini akan dihapus, Anda Yakin?</h4>
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
        $("#deleteModalFunction").attr("href","<?php echo base_url();?>user/delete/"+temp_id);
    }
    </script>