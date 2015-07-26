<?php
require_once '_main.php';
?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                套餐列表
                <small>Plan List</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <p> <a class="btn btn-success btn-sm" href="plan_add.php">添加</a> </p>
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>套餐代码</th>
                                    <th>套餐描述</th>
                                    <th>流量</th>
                                    <th>套餐节点</th>
                                    <th>操作</th>
                                </tr>
                                <?php
                                $n = new \Ss\User\Plan();
                                $plans = $n->AllPlan();
                                $node_name=new \Ss\Node\Node();
                                foreach($plans as $rs){ ?>
                                    <tr>
                                        <td>#<?php echo $rs['id']; ?></td>
                                        <td> <?php echo $rs['plan']; ?></td>
                                        <td> <?php echo $rs['content']; ?></td>
                                        <td> <?php echo $rs['transfer']; ?></td>
                                        <td><?php $node_name->Get_some_node_name($rs['node']); ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="plan_edit.php?id=<?php echo $rs['id']; ?>">编辑</a>
                                            <a class="btn btn-danger btn-sm" href="plan_del.php?id=<?php echo $rs['id']; ?>">删除</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>
