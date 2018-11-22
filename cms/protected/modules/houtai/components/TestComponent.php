<?php
class TestComponent extends CComponent{
	private $_name = 'hugo';
	public function getName(){
		if($this->hasEventHandler('onTsima')){
			$this->onTsima(new CEvent($this));
		}
		return $this->_name;
	}
	public function setName($val){
		$this->_name = $val;
	}
	//����������¼�
	public function onTsima($event){
		$this->raiseEvent('onTsima',$event);
	}
	
	public function say(){
		dump("i am hugo");
	}
}