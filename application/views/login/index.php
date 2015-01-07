<!DOCTYPE html>
<html class="bg-black">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css')?>">	
	<!-- Custom Fonts -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>">    
	<!-- Theme style -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/AdminLTE.css')?>"/>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
    </head>
    <body class="bg-black">

     <div class="form-box" id="login-box">
          <div class="header">Login</div>
          <form action="<?php echo base_url('login/in')?>" method="post" class="form">
               <div class="body bg-gray">
                    <div class="form-group">
                         <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" name="username" class="form-control" placeholder="Username"/>
                        </div>
                  </div>
                  <div class="form-group">
                   <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                  </div>
            </div>
             <?php
             if (!empty($error)) {
                  echo '<p class="text-danger">'.$error.'</p>';
            }
            ?>          
            <div class="form-group">
                       <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1"> <small>Remember me</small>
                      </label>
          </div>          
            <div class="form-group">
                       <label>
                            <input id="login-as-admin" type="checkbox" name="login-as-admin" value="1"> <small>Login as Admin</small>
                      </label>
          </div>
    </div>
    <div class="footer">
       <button type="submit" class="btn bg-olive">Login</button>
       <button type="reset" class="btn bg-olive">Reset</button>
 </div>
</form>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.10.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.min.js')?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/app.js')?>"></script>

</body>
</html>