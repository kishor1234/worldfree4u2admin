<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | OTP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/ap/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/ap/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/ap/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page" style="background-color: #d7e2f9;">
    <div class="login-box">
        <div id="msg"><center>
                <?php
                if (!empty($_SESSION["msg"])) {
                    ?>
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $_SESSION["msg"]; ?>
                    </div>
                    <?php
                    $_SESSION["msg"] = "";
                } else {
                    $_SESSION["msg"] = "";
                }
                ?>
            </center></div>
      <div class="login-logo">
        <a href="#"><b>Admin</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Enter Your OTP</p>
        <center><div id="display"></div></center>
        <form action="/?r=<?php echo $obj->encdata("C_OtpVerify");?>" method="post">
          <div class="form-group has-feedback">
              <input type="password" name="otp" class="form-control" placeholder="***********" autocomplete="off">
              <input type="hidden" name="email" value="<?php echo $_SESSION["tempEmail"];?>"/>
              <span class="glyphicon glyphicon-ban-lock form-control-feedback"><i class="fa fa-lock"></i></span>
          </div>
            <center> <a href="javascript:void(0)" onclick="postURL('<?php echo $obj->encdata("C_ReSendOTP");?>','#display','<?php echo $_SESSION["otp"];?>')"><i class="fa fa-send"></i> Resend</a> </center>
            <br>
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
          
        </form>
        <br><br>
       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="assets/ap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/ap/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="assets/ap/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
       function onLoading()
    {
        $("#cover").show();
        $("#msg").html("<center><img src='logo.gif' style='width:100px;' /><h4 style='color:#000;'><strong>Please Wait.!</strong></h4></center>");
    }
    function offLoading()
    {
        $("#msg").html("");
        $("#cover").hide();
    }
      function postURL(file, display, id)
        {
        onLoading();
       
        $.post("/?r=" + file, {id: id}, function (data) {
            offLoading();
            $(display).html(data);$("#msg").show();
           
        });
        return false;
    }
    </script>
  </body>
</html>
