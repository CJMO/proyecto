<?php
class Attribute{
	private $name;
	private $value;
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($nombre){
        $this->name = $nombre;
        return $this;
    }
	
	public function getValue(){
		return $this->value;
	}
		
	public function setValue($valor){
        $this->value = $valor;
        return $this;
    }
}
?>