<!-- DataTables -->
<script>
	layer.load(1,{
		offset: ['40%', "50%"], 
		shade: [0.8, '#393D49'],
		scrollbar: false
	});
</script>
 <section class="content-header">
      <h1>
        商品管理
        <small>Product list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">商品列表</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>序号</th>
                  <th>商品名称</th>
                  <th>商品品牌</th>
                  <th>商品分类</th>
                  <th>添加时间</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                
                <?php foreach($data as $k=>$v){ ?>
	                <tr>
	                  <td><?php echo $k+1; ?></td>
	                  <td><?php echo $v->goods_name;?></td>
	                  <td><?php echo isset($brand_data[$v->brand_id])?$brand_data[$v->brand_id]:'无'; ?></td>
	                  <td></td>
	                  <td><?php echo date('Y-m-d',$v->add_time);?></td>
	                  <td>删除</td>
	                </tr>
                <?php } ?>
               
                
                
                </tbody>
                <tfoot>
                <tr>
                  <th>序号</th>
                  <th>商品名称</th>
                  <th>商品品牌</th>
                  <th>商品分类</th>
                  <th>添加时间</th>
                  <th>操作</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    


<script>
  $(function () {
  	layer.closeAll('loading'); //关闭加载层
    $('#example1').DataTable({
    	"language": {
	      	"lengthMenu": '每页显示 <select>'+
		         '<option value="10">10</option>'+
		         '<option value="20">20</option>'+
		         '<option value="30">30</option>'+
		         '<option value="40">40</option>'+
		         '<option value="50">50</option>'+
		         '<option value="-1">所有</option>'+
		         '</select> 记录',
		    "paginate": {
		          "first": "首页",
		          "next": "下一页",
		          "previous": '上一页',
		          "last": '末页'
		        },
		    "info": "第_PAGE_页(共_PAGES_页）",
		    "search": '搜索',
		    "infoEmpty": "没有数据",
		    "infoFiltered": " - 从 _MAX_ 记录中筛选",
		    "zeroRecords": '没有数据',
		    "emptyTable": '没有数据'
	    },
	    "columnDefs":[{
				"orderable":false,
				"targets":5
			}],
		"fnDrawCallback": function(oSettings) { 
		    layer.closeAll('loading'); //关闭加载层
		},
		"fnPreDrawCallback":function(oSettings){
			layer.load(1,{
				offset: ['40%', "50%"], 
				shade: [0.8, '#393D49']
			});
		}
    })
    /*$('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
      
    })*/
  })
</script>