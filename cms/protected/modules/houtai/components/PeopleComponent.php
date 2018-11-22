<?php
class PeopleComponent extends CApplicationComponent{
	public $name = 'hugo888888';
	
	public function say(){
		return 'my name is '.$this->name;
	}
}