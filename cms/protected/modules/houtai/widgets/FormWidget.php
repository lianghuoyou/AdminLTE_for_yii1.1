<?php
class FormWidget extends CWidget{
	public $action = '';
	public $method = 'POST';
	public $htmlOptions = array();
	public function init(){
		echo CHtml::beginForm($this->action,$this->method,$this->htmlOptions);
	}
	public function label($label,$for="",$htmlOptions = array()){
		return CHtml::label($label,$for,$htmlOptions);
	}
	public function textField($name,$value = '',$htmlOptions = array()){
		return CHtml::textField($name,$value,$htmlOptions);
	}
	public function run(){
		echo CHtml::endForm();
	}
	
}