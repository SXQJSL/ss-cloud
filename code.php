<?php
require_once 'lib/config.php';
include_once 'header.php';
$c = new \Ss\User\Invite();
?>
<body>
<div class="container">
    <?php include_once 'nav.php';?>

    <div class="jumbotron">
        <p class="lead"> 邀请码实时刷新</p>
        <p>每星期一更新，如遇到无邀请码请加群<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=78d4b571c52e73bd07f4483395a42d04ebb2949b14a51b56fadf84509c0d2930"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="管道工Club交流群" title="管道工Club交流群"></a>获取。对于超过两天没有签到的账号，我们将予以清除</p>
    </div>

    <div class="row marketing">
        <h2 class="sub-header">邀请码</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>###</th>
                    <th>邀请码</th>
                    <th>状态</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $datas = $c->CodeArray();
                $a = 0;
                foreach($datas as $data ){
                ?>
                <tr>
                    <td><?php echo $a;$a++; ?></td>
                     <td><?php echo $data['code'];?></td>
                    <td>可用</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div><?php
            include_once 'footer.php';
            include_once 'ana.php';?>

</div> <!-- /container -->
</body>
</html>
