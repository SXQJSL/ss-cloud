<?php
require_once '../lib/config.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site_name;  ?></title>
    <!-- Bootstrap core CSS -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/flat-ui.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../asset/css/sticky-footer-navbar.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $site_name;  ?></a>
        </div>

    </div>
</nav>

<!-- Begin page content -->
<div class="container">
    <div class="page-header">
        <h1>用户协议 Terms of Service </h1>
    </div>
   <h3>同意条款</h3>
    <p>
        </p><ul>
            <li>用户点击"注册"按钮时，我们将默认用户已经同意以下所有条款。</li>
        </ul>
    <p></p>

    <h3>服务</h3>
    <p>
        </p><ul>
            <li>我们通过提供连接到国际互联网的服务，为您提供全新的上网体验。</li>
        </ul>
    <p></p>

    <h3>免责</h3>
    <p>
        </p><ul>
            <li>请遵守国家相关法律法规使用本站的服务，不得用作非法用途，如有违反本站不承担任何责任；</li>
            <li>如有违反国家相关法律法规，使用本软件进行入侵、破坏、诈骗、发布非法言论等及其他违反法律的行为，一经发现我们将立刻删除其账户；</li>
            <li>我们将保留相关记录以备国家公安机关调阅；</li>
			<li>由于网站被攻击或其他不可抗力因素导致的后果，本站不承担任何责任。</li>
        </ul>
    <p></p>

    <h3>规则</h3>
    <p>
        </p><ul>
            <li>您在使用上述服务时必须遵守的规则</li>
			<li>遵守您所在国家或地区的法律法规，请勿使用我们的服务从事任何违法活动；</li>
			<li>帐号仅限您个人非商业目的使用，请勿与他人分享帐号；</li>
			<li>尊重并保护版权，请勿下载受版权保护的文件，禁止任何P2P下载，包括但不限于BT、迅雷、电骡；</li>
			<li>请勿长期占用大量带宽资源；</li>
			<li>请勿执行任何危害服务器安全性的操作；</li>
			<li>用户违反规则时本站有权删除用户账户。</li>
        </ul>
    <p></p>

    <h3>可用性</h3>
    <p>
        </p><ul>
            <li>我们对服务可用性的承诺是</li>
			<li>服务器性能、线路负载均在可承受范围之内；</li>
			<li>提供尽可能稳定的服务，但是考虑到网络状况的复杂性，并不保证100%可用。</li>

        </ul>
    <p></p>

    <h3>隐私与安全</h3>
    <p>
        </p><ul>
            <li>您在使用我们的服务之前，务必了解以下事项</li>
			<li>您在使用我们的服务时，所有网络数据都会经过我们的服务器；</li>
			<li>您和本站之间的通信都经过加密，您设置的登录密码也经过了严格的加密，任何人都无法获得您的登录密码；</li>
			<li>由于服务需要，我们可能会明文保存您的服务连接密码，尽管我们会尽可能保证密码的安全性，也请您不要使用与其他服务相同的密码，并请定期更新连接密码；</li>
			<li>由于用户密码被盗导致的任何后果，本站不承担任何责任。</li>
        </ul>
    <p></p>

    <h3>修改条款权利</h3>
    <p>
        </p><ul>
            <li><?php echo $site_name?>保留随时修改服务条款的权利，如有变更，恕不另行通知。</li>
        </ul>
    <p></p>

</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted"><strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#"><?php echo $site_name;  ?></a>.</strong> All rights reserved. Powered by  <b>3306.club</b> <?php echo $version; ?> </p><script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?08b635895059b49392dc58715a72fafe";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
        
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../asset/js/jQuery.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>

</body>
</html>
