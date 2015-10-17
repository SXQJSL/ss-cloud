<?php
require_once '_main.php';
$invite = new \Ss\User\Invite($uid);
$code = $invite->CodeArray();
?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
              流量卡
                <small>Transfer</small>
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
                            <h3 class="box-title">生成流量卡</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="invite_add_do.php">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="cate_title">流量卡前缀</label>
                                    <input  class="form-control" name="code_sub" placeholder="小于8个字符"  >
                                </div>

                                <div class="form-group">
                                    <label for="cate_title">流量卡类别</label>
                                    <input  class="form-control" name="code_type"  placeholder="0为公开，其他数字为对应用户的UID" >
                                </div>

                                <div class="form-group">
                                    <label for="cate_title">流量卡数量</label>
                                    <input  class="form-control" name="code_num" placeholder="要生成的邀请码数量"  >
                                </div>


                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="action" value="add" class="btn btn-primary">添加</button>
                            </div>

                            <div class="box-footer">
                                <p>邀请码类别0 </p>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box -->
				<div class="col-md-6">
				 <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">邀请</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>当前您可以生成<code><?php   echo $U->InviteNum();  ?></code>个邀请码。  </p>
                            <?php  if($U->InviteNum() !=0){ ?>
                                <button id="invite" class="btn btn-sm btn-info">生成我的邀请码</button>
                            <?php } ?>

                            <div id="msg-error" class="alert alert-warning alert-dismissable" style="display:none">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                                <p id="msg-error-p"></p>
                            </div>

                        </div><!-- /.box -->

                        <div class="box-header">
                            <h3 class="box-title">我的邀请码</h3>
                        </div><!-- /.box-header -->

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
                                $a = 0;
                                foreach($code as $data ){
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
                    </div>
                </div>
				</div>
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>
