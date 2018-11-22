<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>登录</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo HOUTAI_ASSETS_PATH;?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo HOUTAI_ASSETS_PATH;?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo HOUTAI_ASSETS_PATH;?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo HOUTAI_ASSETS_PATH;?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo HOUTAI_ASSETS_PATH;?>dist/css/login.css">
  <link rel="stylesheet" href="<?php echo HOUTAI_ASSETS_PATH;?>dist/css/index.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo HOUTAI_ASSETS_PATH;?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html">腾讯科技有限公司</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">后台管理系统</p>

    <?php $form = $this->beginWidget('CActiveForm'); ?>
      <div class="form-group has-feedback">
        <?php echo $form->textField($login_form,'user_name',array('class'=>'form-control','placeholder'=>'用户名','type'=>'email')); ?>
        <?php echo $form->error($login_form,'user_name'); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo $form->passwordField($login_form,'password',array('class'=>'form-control','placeholder'=>'密码')); ?>
         <?php echo $form->error($login_form,'password'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <?php echo $form->textField($login_form,'verifycode',array('class'=>'form-control','placeholder'=>'验证码','style'=>'width:60%;display:inline;')); ?>
        <?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击刷新验证码','title'=>'点击刷新验证码','style'=>'cursor:pointer;withd:40% !important;height: 38px;','onClick'=>'this.src=this.src+Math.random();'))); ?>
        <?php echo $form->error($login_form,'verifycode'); ?>
        <span class="glyphicon form-control-feedback"></span>
      </div>
      
      
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
              <?php echo $form->checkBox($login_form,'rememberMe'); ?>
              <?php echo $form->labelEx($login_form,'rememberMe',array('id'=>'remember')); ?>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
        </div>
        <!-- /.col -->
      </div>
    <?php $this->endWidget();?>

    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->
    <a href="#">忘记密码</a><br>
    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo HOUTAI_ASSETS_PATH;?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo HOUTAI_ASSETS_PATH;?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo HOUTAI_ASSETS_PATH;?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
