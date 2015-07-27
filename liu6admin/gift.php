<?php
require_once '_main.php';

?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                批量送流量
                <small>Invite</small>
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
                            <h3 class="box-title">批量送流量</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="cate_title">赠送类别</label>
                                    <input  class="form-control" name="user_type"  id="user_type" placeholder="0为所有用户" >
                                </div>

                                <div class="form-group">
                                    <label for="cate_title">赠送流量数量G</label>
                                    <input  class="form-control" name="gift_num" id="gift_num" placeholder="需要赠送的流量数量G为单位"  >
                                </div>
                                <div class="add_status"></div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="action" id="submit_button" class="btn btn-primary">赠送</button>
                            </div>                   
                    </div>
                </div><!-- /.box -->
				</div>
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
        <script>
document.getElementById("submit_button").onclick=(
		function createcode(){
			   $.ajax({
		           type:"POST",
		           url:"./function/_gift.php",
		           data:{user_type:document.getElementById("user_type").value,gift_num:document.getElementById("gift_num").value},
		           beforeSend:function(){$("#add_status").html("生成中····");},
		           success:function(response,status){
		        	   alert('添加成功');
		        	   location.reload();  

		           }   ,
		           error: function(){
		           	alert('添加失败');
		           }         
		        });	
		}
		);
</script>
<?php
require_once '_footer.php'; ?>
