<?php
require_once '../lib/config.php';
$code = $_GET['code'];
$uid  = $_GET['uid'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $site_name;  ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../asset/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="../asset/css/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b><?php echo $site_name;  ?></b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">重置密码</p>

        <div id="msg-success" class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i> 成功!</h4>
            <p id="msg-success-p"></p>
        </div>

        <div id="msg-error" class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
            <p id="msg-error-p"></p>
        </div>

        <input type="hidden" id="code" name="code" class="form-control" value="<?php echo $code;?>" >
        <input type="hidden" id="uid" name="uid" class="form-control" value="<?php echo $uid;?>" >

        <div class="form-group has-feedback">
            <input id="email" name="Email" type="text" class="form-control" placeholder="Email"/>
            <span  class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <button type="submit" id="reset" class="btn btn-primary btn-block btn-flat">确认重置</button>
        </div>

        <a href="login.php" class="text-center">返回登录</a>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="../asset/js/jQuery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../asset/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="../asset/js/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
    $("#msg-error").hide();
    $("#msg-success").hide();
</script>
<script>
    $(document).ready(function(){
        $("#reset").click(function(){
            $.ajax({
                type:"GET",
                url:"_resetpwdtwo.php?code="+$("#code").val()+"&uid="+$("#uid").val()+"&email="+$("#email").val(),
                dataType:"json",
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide();
                        $("#msg-success").show();
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='index.php'", 2000);
                    }else{
                        $("#msg-error").show();
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script>


</body>
</html>