<?php
	$this->widget('application.modules.houtai.widgets.UserWidget',array(
		'num'=>100
	));
?> 
<!-- 双标签widget使用-->
<div class="form">
	<?php $form = $this->beginWidget('application.modules.houtai.widgets.FormWidget'); ?>
	<?php echo $form->label('用户名'); ?>
	<?php echo $form->textField('username'); ?>
	
	<?php $this->endWidget(); ?>
</div>