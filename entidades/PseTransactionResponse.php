<?php

/**
 * Clase PseTransactionResponse
 */
 
class PseTransactionResponse{
    /**
     * @var integer
     */
    private $transactionid;

    /**
     * @var string
     */
    private $sessionid;

    /**
     * @var string
     */
    private $returncode;

    /**
     * @var string
     */
    private $trazabilitycode;

    /**
     * @var integer
     */
    private $transactioncycle;

    /**
     * @var string
     */
    private $bankcurrency;

    /**
     * @var float
     */
    private $bankfactor;

    /**
     * @var string
     */
    private $bankurl;

    /**
     * @var integer
     */
    private $responsecode;

    /**
     * @var string
     */
    private $responsereasoncode;

    /**
     * @var string
     */
    private $responsereasontext;


    /**
     * Get transactionid
     * @return integer
     */
    public function getTransactionid(){
        return $this->transactionid;
    }
	
	/**
     * Set transactionid
     *
     * @param string $transactionid
     *
     * @return Psetransactionresponse
     */
    public function setTransactionid($transactionid){
        $this->transactionid = $transactionid;

        return $this;
    }

    /**
     * Set sessionid
     *
     * @param string $sessionid
     *
     * @return Psetransactionresponse
     */
    public function setSessionid($sessionid){
        $this->sessionid = $sessionid;

        return $this;
    }

    /**
     * Get sessionid
     *
     * @return string
     */
    public function getSessionid()
    {
        return $this->sessionid;
    }

    /**
     * Set returncode
     *
     * @param string $returncode
     *
     * @return Psetransactionresponse
     */
    public function setReturncode($returncode)
    {
        $this->returncode = $returncode;

        return $this;
    }

    /**
     * Get returncode
     *
     * @return string
     */
    public function getReturncode()
    {
        return $this->returncode;
    }

    /**
     * Set trazabilitycode
     *
     * @param string $trazabilitycode
     *
     * @return Psetransactionresponse
     */
    public function setTrazabilitycode($trazabilitycode)
    {
        $this->trazabilitycode = $trazabilitycode;

        return $this;
    }

    /**
     * Get trazabilitycode
     *
     * @return string
     */
    public function getTrazabilitycode()
    {
        return $this->trazabilitycode;
    }

    /**
     * Set transactioncycle
     *
     * @param integer $transactioncycle
     *
     * @return Psetransactionresponse
     */
    public function setTransactioncycle($transactioncycle)
    {
        $this->transactioncycle = $transactioncycle;

        return $this;
    }

    /**
     * Get transactioncycle
     *
     * @return integer
     */
    public function getTransactioncycle()
    {
        return $this->transactioncycle;
    }

    /**
     * Set bankcurrency
     *
     * @param string $bankcurrency
     *
     * @return Psetransactionresponse
     */
    public function setBankcurrency($bankcurrency)
    {
        $this->bankcurrency = $bankcurrency;

        return $this;
    }

    /**
     * Get bankcurrency
     *
     * @return string
     */
    public function getBankcurrency()
    {
        return $this->bankcurrency;
    }

    /**
     * Set bankfactor
     *
     * @param float $bankfactor
     *
     * @return Psetransactionresponse
     */
    public function setBankfactor($bankfactor)
    {
        $this->bankfactor = $bankfactor;

        return $this;
    }

    /**
     * Get bankfactor
     *
     * @return float
     */
    public function getBankfactor()
    {
        return $this->bankfactor;
    }

    /**
     * Set bankurl
     *
     * @param string $bankurl
     *
     * @return Psetransactionresponse
     */
    public function setBankurl($bankurl)
    {
        $this->bankurl = $bankurl;

        return $this;
    }

    /**
     * Get bankurl
     *
     * @return string
     */
    public function getBankurl()
    {
        return $this->bankurl;
    }

    /**
     * Set responsecode
     *
     * @param integer $responsecode
     *
     * @return Psetransactionresponse
     */
    public function setResponsecode($responsecode)
    {
        $this->responsecode = $responsecode;

        return $this;
    }

    /**
     * Get responsecode
     *
     * @return integer
     */
    public function getResponsecode()
    {
        return $this->responsecode;
    }

    /**
     * Set responsereasoncode
     *
     * @param string $responsereasoncode
     *
     * @return Psetransactionresponse
     */
    public function setResponsereasoncode($responsereasoncode)
    {
        $this->responsereasoncode = $responsereasoncode;

        return $this;
    }

    /**
     * Get responsereasoncode
     *
     * @return string
     */
    public function getResponsereasoncode()
    {
        return $this->responsereasoncode;
    }

    /**
     * Set responsereasontext
     *
     * @param string $responsereasontext
     *
     * @return Psetransactionresponse
     */
    public function setResponsereasontext($responsereasontext)
    {
        $this->responsereasontext = $responsereasontext;

        return $this;
    }

    /**
     * Get responsereasontext
     *
     * @return string
     */
    public function getResponsereasontext()
    {
        return $this->responsereasontext;
    }
}

