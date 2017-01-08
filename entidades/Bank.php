<?php

class Bank{
    
    /**
     * @var string
     */
	private $bankcode;

    /**
     * @var string
     */
    private $bankname;

	function __construct($nombre, $codigo){
		$this->bankcode = $codigo;
		$this->bankname = $nombre;
	}

    /**
     * Get bankcode
     *
     * @return string
     */
    public function getBankcode(){
        return $this->bankcode;
    }

    /**
     * Set bankname
     *
     * @param string $bankname
     *
     * @return Bank
     */
    public function setBankname($bankname){
        $this->bankname = $bankname;

        return $this;
    }

    /**
     * Get bankname
     *
     * @return string
     */
    public function getBankname(){
        return $this->bankname;
    }
}
?>