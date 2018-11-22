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
        品牌管理
        <small>Product list</small>
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>-->
      <?php 
      	$this->breadcrumbs = array(
      		'品牌管理'=>array('brand/brandList'),
      	);
      ?>
      <ol class="breadcrumb">
      <?php if(isset($this->breadcrumbs)):?>
      	<?php $this->widget('zii.widgets.CBreadcrumbs',array(
      		'homeLink'=>CHtml::link(Yii::t('zii','首页'),'index.php?r=houtai'),
      		'links'=>$this->breadcrumbs,
      		'separator'=>'&nbsp;&nbsp;&gt;&nbsp;&nbsp;'
      	));?>
      <?php endif ?>
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
                  <th>品牌名称</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                	if($this->beginCache('brandlist',array(
                		'duration'=>3600,
                		/*'varyByParam'=>array('page'),*/
                		'dependency'=>array(
                			'class'=>'system.caching.dependencies.CDbCacheDependency',
                			'sql'=>'select count(*) from {{erp_brand}}'
                		),
                	)
                		)
                			){
                ?>
                <?php foreach($data as $k=>$v){ ?>
	                <tr>
	                  <td><?php echo $k+1; ?></td>
	                  <td><?php echo $v->brand_name;?></td>
	                  <td><a href="<?php echo $this->createUrl('brand/editBrand',array('brand_id'=>$v->brand_id)); ?>">编辑</a> | <a href="<?php echo $this->createUrl('brand/delBrand',array('brand_id'=>$v->brand_id)); ?>">删除</a></td>
	                </tr>
                <?php } ?>
               
                <?php
                	$this->endCache(); }
                ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>序号</th>
                  <th>品牌名称</th>
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
				"targets":2
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
    
    
    <?php 
    	if(Yii::app()->user->hasFlash('brand_success')){
			echo "layer.msg('".Yii::app()->user->getFlash('brand_success')."', {icon: 6});";
		}
		
		if(Yii::app()->user->hasFlash('brand_edit_success')){
			echo "layer.msg('".Yii::app()->user->getFlash('brand_edit_success')."', {icon: 6});";
		}
    ?>
  })
</script>