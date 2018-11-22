<!-- Content Header (Page header) -->
<link rel="stylesheet" type="text/css" href="<?php echo HOUTAI_ASSETS_PATH;?>dist/js/Huploadify/Huploadify.css"/>
<script type="text/javascript" src="<?php echo HOUTAI_ASSETS_PATH;?>dist/js/Huploadify/jquery.Huploadify.js"></script>



<!-- 配置文件 -->
<script type="text/javascript" src="<?php echo HOUTAI_ASSETS_PATH;?>plugins/ueditor-dev-1.5.0/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo HOUTAI_ASSETS_PATH;?>plugins/ueditor-dev-1.5.0/editor_api.js"></script>
<section class="content-header">
  <h1>
    编辑品牌
    <small>Brand</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Forms</a></li>
    <li class="active">General Elements</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <!--<div class="box-header with-border">
          <h3 class="box-title">添加品牌</h3>
        </div>-->
        <!-- /.box-header -->
        <!-- form start -->
        <?php $form = $this->beginWidget('CActiveForm'); ?>
          <div class="box-body">
            <div class="form-group">
              <?php echo $form->labelEx($brand_model,'brand_name',array('for'=>'brand_name')) ?>
              
              <?php echo $form->textField($brand_model,'brand_name',array('class'=>'form-control','id'=>'form-control','placeholder'=>'品牌名称')) ?>
              <?php echo $form->error($brand_model,'brand_name'); ?>
              
            </div>
            
            <div class="form-group">
              <?php echo $form->labelEx($brand_model,'brand_logo',array('for'=>'upload')); ?>
              <div id="upload"></div>
              <?php echo $form->hiddenField($brand_model,'brand_logo',array('id'=>'brand_logo')) ?>
              <img  id="img" width="200px" src="<?php echo $brand_model->brand_logo?>"  />
            </div>
            
            <div class="form-group">
              <?php echo $form->labelEx($brand_model,'brand_desc',array('for'=>'brand_desc')); ?>
              
              <!-- 百度编辑器 -->
              <script id="brand_desc" name="Brand[brand_desc]" type="text/plain" style="width:1024px;height:500px;" ></script>
            </div>
            <text id="hide_brand_desc" style="display: none;"><?php echo $brand_model->brand_desc; ?></text>
            
            <!--<div class="checkbox">
              <label>
                <input type="checkbox"> Check me out
              </label>
            </div>-->
            
          </div>
          <!-- /.box-body -->
			
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">提交</button>
          </div>
        <?php $this->endwidget(); ?>
      </div>

    </div>
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<script type="text/javascript">
var imgPath = '<?php echo HOUTAI_ASSETS_PATH;?>dist/img/upload/';
$(function(){
	//实例化编辑器
	var ue = UE.getEditor('brand_desc');
	var content = $("#hide_brand_desc").html();
	ue.ready(function() { //编辑器初始化完成再赋值
		ue.setContent(content);   //赋值给UEditor
	});

	
	$('#upload').Huploadify({
		auto:true,
		fileTypeExts:'*.jpg;*.png;*.exe',
		multi:false,
		formData:{key:123456,key2:'vvvv'},
		fileSizeLimit:9999,
		showUploadedPercent:true,//是否实时显示上传的百分比，如20%
		showUploadedSize:true,
		removeTimeout:10,
		uploader:'./index.php?r=houtai/Image/upload',
		onUploadStart:function(){
			//alert('开始上传');
		},
		onInit:function(){
			//alert('初始化');
		},
		onUploadComplete:function(file,data){
			$("#img").attr('src',imgPath+file.name);
			$("#brand_logo").val(data);
			$("#img").show();
		},
		onCancel:function(file){
			console.log('删除的文件：'+file);
			console.log(file);
		}
	});
});
</script>