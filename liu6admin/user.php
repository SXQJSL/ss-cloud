<?php

require_once '_main.php';
$Users = new Ss\User\User();
?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理
                <small>User Manage</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>套餐</th>
                                    <th>端口</th>
                                    <th>总流量</th>
                                    <th>剩余流量</th>
                                    <th>已使用流量</th>
                                    <th>最后签到</th>
                                    <th>状态</th>
                                    <th>最后使用时间</th>
                                    <th>在线状态</th>
                                    <th>备注</th>
                                    <th>快捷操作</th>
                                </tr>
                                <?php
                                $page=!empty($_GET['page']) ? $_GET['page'] : null;
                                $page=$Users->Page($page);
                                $us = $Users->ListUser($page);
                                foreach ( $us as $rs ){ ?>
                                    <tr>
                                        <td>#<?php $getinfo= new Ss\User\UserInfo();
                                        echo $rs['uid']; ?></td>
                                        <td><?php echo $getinfo->Get_username1($rs['uid']); ?></td>
                                        <td><?php echo $getinfo->GetEmail(); ?></td>
                                        <td><?php echo $rs['plan']; ?></td>
                                        <td><?php echo $rs['port']; ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow($rs['transfer_enable']); ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow(($rs['transfer_enable']-$rs['u']-$rs['d'])); ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow(($rs['u']+$rs['d'])); ?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$getinfo->Get_last_check_in_time()); ?></td>
                                        <td> <?php if($rs['enable']==1){echo '正常';}else{echo '<span style="color:red">锁定</span>';}?> </td>
                                        <td> <?php echo date('Y-m-d H:i:s',$rs['t']);?> </td>
                                        <td><?php if((time()-$rs['t'])<=100){echo '在线';}else {echo '';};?></td>
                                        <td><?php echo $rs['remark'];?></td>
                                        <td>  
                                            <a class="btn btn-<?php if($rs['enable']==1){echo 'success';}else{echo 'warning';}?>" id="<?php echo 'port_status'.$rs['port']?>" onclick="status_change( <?php echo $rs['port'].','.$rs['enable'] ?> )" ><?php if($rs['enable']==1){echo '正常';}else{echo '解锁';}?></a>          
                                            <a class="btn btn-info" href="user_edit.php?port=<?php echo $rs['port']?>&&page=<?php echo $page; ?>">查看</a>
                                            <a class="btn btn-danger" href="user_del.php?uid=<?php echo $rs['uid']?>&&page=<?php echo $page;?>">删除</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                  <div class="box-body table-responsive no-padding">  
                  <table class="table table-hover">
                  <tr>
                                    <th><a class="btn btn-default" href="user.php?page=<?php if($page==1){echo $page;}else{echo $page-1;}?>">上一页</a></th>
                                    <th><a class="btn btn-default" href="user.php?page=<?php echo $page+1;?>"> 下一页</a></th>
                                </tr></table></div></div></div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <script>
function status_change(port_value,enable_value){
	$.ajax({
        type:"POST",
        url:"./function/user_status_change.php",
        data:{port:port_value,enable:enable_value},
        beforeSend:function(){$("#"+"port_status"+port_value).html("处理");},
        success:function(response,status){
     	   location.reload();  

        }   ,
        error: function(){
        	alert('处理失败');
        }         
     });	
}
    </script>
<?php
require_once '_footer.php'; ?>
