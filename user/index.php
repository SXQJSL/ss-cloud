<?php
require_once '_main.php';

//获得流量信息
if($oo->get_transfer()<1000000)
{
    $transfers=0;}else{ $transfers = $oo->get_transfer();

}
//计算流量并保留2位小数
$all_transfer = $oo->get_transfer_enable()/$togb;
$unused_transfer =  $oo->unused_transfer()/$togb;
$used_100 = $oo->get_transfer()/$oo->get_transfer_enable();
$used_100 = round($used_100,2);
$used_100 = $used_100*100;
//计算流量并保留2位小数
$transfers = $transfers/$tomb;
$transfers = round($transfers,2);
$all_transfer = round($all_transfer,2);
$unused_transfer = round($unused_transfer,2);
//最后在线时间
$unix_time = $oo->get_last_unix_time();
?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户中心
                <small>User Center</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- START PROGRESS BARS -->
            <div class="column">
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">公告&FAQ（新用户必读）</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>未防止注册泛滥，所有新注册账号默认为<span style="color:red">锁定</span>状态，这个时候无法连接任何SS服务器,请加官方群找群主进行解锁，无需任何费用</p>
                            <p>普通账号中的流量可以通过签到获得更多流量，能保障基本的网页浏览，视频除外。</p>
							<p>如果流量不够用，经常看视频或者对画质要求稍高的朋友，可以购买我们的优惠付费计划，使用VIP高速节点，看视频无压力</p>
                            <p>如果有其他变动，我们也将在群中进行通知，请还没加群的you赶紧加入我们的群吧<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=78d4b571c52e73bd07f4483395a42d04ebb2949b14a51b56fadf84509c0d2930"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="管道工Club交流群" title="管道工Club交流群"></a>  <——点击一键加群</p> 
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">签到获取流量</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p> 22小时内可以签到一次。</p>
                            <?php  if($oo->is_able_to_check_in())  { ?>
                                <p id="checkin-btn"> <button id="checkin" class="btn btn-success  btn-flat">签到</button></p>
                            <?php  }else{ ?>
                                <p><a class="btn btn-success btn-flat disabled" href="#">不能签到</a> </p>
                            <?php  } ?>
                            <p id="checkin-msg" ></p>
                            <p>上次签到时间：<code><?php echo date('Y-m-d H:i:s',$oo->get_last_check_in_time());?></code></p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (left) -->


                </div><!-- /.column -->

                 <div class="column">
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">端口信息</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p> 状态：</p>
                            <p> 端口：<code></code> </p>
                            <p> 密码：</p>
                            <p> 套餐：<span class="label label-info">  </span> </p>
                            <p> 最后使用时间：<code></code> </p>
                            <p> 已用流量：</p>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $used_100; ?>%">
                                    <span class="sr-only">Transfer</span>
                                </div>
                            </div>
                            <p> 可用流量：</p>
                            <p> 剩余流量： </p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->
            </div><!-- /.column -->
            <!-- END PROGRESS BARS -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>

<script>
    $(document).ready(function(){
        $("#checkin").click(function(){
            $.ajax({
                type:"GET",
                url:"_checkin.php",
                dataType:"json",
                success:function(data){
                    $("#checkin-msg").html(data.msg);
                    $("#checkin-btn").hide();
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script>

