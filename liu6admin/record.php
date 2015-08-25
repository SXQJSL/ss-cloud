<?php
require_once '_main.php';
?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                节点详情
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
                                    <th>服务器id</th>
                                    <th>通讯时间</th>
                                    <th>在线人数</th>

                                </tr>
                                <?php
                                $record = new Ss\Node\Record();
                                $datas = $record->AllRecord();
                                foreach ( $datas as $rs ){ ?>
                                    <tr>
                                        <td>#<?php echo $rs['id']; ?></td>
                                        <td><?php echo $rs['node_id']; ?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$rs['time']); ?></td>
                                        <td><?php echo count(json_decode($rs['content'])) ; ?></td>
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
