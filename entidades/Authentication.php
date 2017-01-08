<?php

class Authentication{
    private $login;
    private $tranKey;
    private $seed;
    private $additional;
	
    public function __construct($login, $tranKey, $datos=null){
        $this->login = $login;
        $this->seed = date('c');
        $this->tranKey = $this->setHashKey($tranKey);
		// agregar datos adicionales si estan presentes
        if ($datos != null) $this->additional = $datos;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getTranKey(){
        return $this->tranKey;
    }

    public function setTranKey($tranKey){
        $this->tranKey = $tranKey;
    }

    public function getAdditional(){
        return $this->additional;
    }
    
    public function setAdditional($additional){
        $this->additional = $additional;
    }

    private function setHashKey($tranKey){
        return sha1($this->seed . $tranKey, false);
    }
}
?>