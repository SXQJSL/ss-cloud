<?php
require_once '_main.php';
?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            套餐添加
            <small>Add Plan</small>
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
                        <h3 class="box-title">添加套餐</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="plan_add_succeed.php">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="cate_title">套餐代码</label>
                                <input  class="form-control" name="plan_code" value="" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">套餐描述</label>
                                <input  class="form-control" name="plan_describe" value="" >
                            </div>

                            <div class="form-group">
                                <label for="cate_method">套餐节点（填写节点ID，用逗号隔开，不要包含#）</label>
                                <input id="ip_plan" class="form-control" name="plan_node" value="" >
                            </div>


                            <div class="form-group">
                                <label for="cate_title">套餐流量</label>
                                <input  class="form-control" name="plan_transfer" value="" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">套餐类型（1永久2月3季4半年5年</label>
                                <input  class="form-control" name="plan_type" value="" >
                            </div>
                            
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" value="add" class="btn btn-primary">添加</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">可选节点</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="plan_add.php">
                       <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>节点</th>
                                    <th>加密</th>
                                    <th>描述</th>
                                    <th>排序</th>
                                    <th>操作</th>
                                </tr>
                                <?php
                                $n=new \Ss\Node\Node();
                                $nodes = $n->Get_Node_Uid($uid);
                                foreach($nodes as $rs){ ?>
                                    <tr>
                                        <td><?php echo $rs['id']; ?></td>
                                        <td> <?php echo $rs['node_name']; ?></td>
                                        <td> <?php echo $rs['node_method']; ?></td>
                                        <td><?php echo $rs['node_info']; ?></td>
                                        <td><?php echo $rs['node_order']; ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm" onClick="javascript:add();" >添加</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /.box-body -->     
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!-- jQuery 2.1.3 -->
<script src="../asset/js/jQuery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../asset/js/bootstrap.min.js" type="text/javascript"></script>
<script>
         function add(){
        	 alert('开发中');
             }
</script>
<?php
require_once '_footer.php'; ?>
