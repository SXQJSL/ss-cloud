<?php
require_once '_main.php';


//更新

if(!empty($_GET)){
    //获取id
    $uid = $_GET['uid'];
    $u = new \Ss\User\UserInfo($uid);
    $rs = $u->UserArray();
}
?>

<!-- =============================================== -->

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
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">编辑用户</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="user_editsucceed.php">
                        <div class="box-body">


                            <input type="hidden" class="form-control" name="user_uid" value="<?php echo $uid;?>"  >

                            <div class="form-group">
                                <label for="cate_title">用户名</label>
                                <input  class="form-control" name="user_name" value="<?php echo $rs['user_name'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户邮箱</label>
                                <input  class="form-control" name="user_email" value="<?php echo $rs['email'];?>"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户密码</label>
                                <input type="hidden" name="user_pass_hidden" value="<?php echo $rs['pass'];?>" >
                                <input  class="form-control" name="user_pass" placeholder="新密码(不修改请留空)" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">状态（更改状态 正常：0 锁定：1）</label>
                                <input  class="form-control" name="states" value="<?php if($rs['states']==0){echo '正常';}else{echo'锁定';};
                                ?>" >
                            </div>
                            
                            <div class="form-group">
                                <label for="cate_title">连接密码</label>
                                <input  class="form-control" name="user_passwd" value="<?php echo $rs['passwd'];?>" >
                            </div>
                            
                            <div class="form-group">
                                <label for="cate_title">套餐计划</label>
                                <input   class="form-control" name="user_plan"  placeholder="<?php echo $rs['plan'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">设置流量</label>
                                <input type="hidden" name="transfer_enable_hidden" value="<?php echo $rs['transfer_enable'];?>" >
                                <input   class="form-control" name="transfer_enable"  placeholder="目前为<?php \Ss\Etc\Comm::flowAutoShow($rs['transfer_enable']);?>，直接输入数值" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">备注</label>
                                <input type="hidden" name="remark_hidden" value="<?php $rs['remark'] ?>" >
                                <input   class="form-control" name="remark"  placeholder="<?php if($rs['remark']!=null){echo $rs['remark'];}else {echo '暂无备注';}?>" >
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" value="edit" class="btn btn-primary">修改</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>
