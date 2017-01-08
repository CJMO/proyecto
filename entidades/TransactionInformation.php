<?php

/**
 * Clase TransactionInformation
 */
class TransactionInformation{
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
    private $reference;

    /**
     * @var string
     */
    private $requestdate;

    /**
     * @var string
     */
    private $bankprocessdate;

    /**
     * @var boolean
     */
    private $ontest;

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
    private $transactionstate;

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
     * Set transactionid
     *
     * @param string $transactionid
     *
     * @return Transactioninformation
     */
    public function setTransactionid($transactionid){
        $this->transactionid = $transactionid;

        return $this;
    }
	
    /**
     * Get transactionid
     * @return integer
     */
    public function getTransactionid(){
        return $this->transactionid;
    }

    /**
     * Set sessionid
     *
     * @param string $sessionid
     *
     * @return Transactioninformation
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
    public function getSessionid(){
        return $this->sessionid;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Transactioninformation
     */
    public function setReference($reference){
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference(){
        return $this->reference;
    }

    /**
     * Set requestdate
     *
     * @param string $requestdate
     *
     * @return Transactioninformation
     */
    public function setRequestdate($requestdate){
        $this->requestdate = $requestdate;

        return $this;
    }

    /**
     * Get requestdate
     *
     * @return string
     */
    public function getRequestdate(){
        return $this->requestdate;
    }

    /**
     * Set bankprocessdate
     *
     * @param string $bankprocessdate
     *
     * @return Transactioninformation
     */
    public function setBankprocessdate($bankprocessdate){
        $this->bankprocessdate = $bankprocessdate;

        return $this;
    }

    /**
     * Get bankprocessdate
     *
     * @return string
     */
    public function getBankprocessdate(){
        return $this->bankprocessdate;
    }

    /**
     * Set ontest
     *
     * @param boolean $ontest
     *
     * @return Transactioninformation
     */
    public function setOntest($ontest){
        $this->ontest = $ontest;

        return $this;
    }

    /**
     * Get ontest
     *
     * @return boolean
     */
    public function getOntest(){
        return $this->ontest;
    }

    /**
     * Set returncode
     *
     * @param string $returncode
     *
     * @return Transactioninformation
     */
    public function setReturncode($returncode){
        $this->returncode = $returncode;

        return $this;
    }

    /**
     * Get returncode
     *
     * @return string
     */
    public function getReturncode(){
        return $this->returncode;
    }

    /**
     * Set trazabilitycode
     *
     * @param string $trazabilitycode
     *
     * @return Transactioninformation
     */
    public function setTrazabilitycode($trazabilitycode){
        $this->trazabilitycode = $trazabilitycode;

        return $this;
    }

    /**
     * Get trazabilitycode
     *
     * @return string
     */
    public function getTrazabilitycode(){
        return $this->trazabilitycode;
    }

    /**
     * Set transactioncycle
     *
     * @param integer $transactioncycle
     *
     * @return Transactioninformation
     */
    public function setTransactioncycle($transactioncycle){
        $this->transactioncycle = $transactioncycle;

        return $this;
    }

    /**
     * Get transactioncycle
     *
     * @return integer
     */
    public function getTransactioncycle(){
        return $this->transactioncycle;
    }

    /**
     * Set transactionstate
     *
     * @param string $transactionstate
     *
     * @return Transactioninformation
     */
    public function setTransactionstate($transactionstate) {
        $this->transactionstate = $transactionstate;

        return $this;
    }

    /**
     * Get transactionstate
     *
     * @return string
     */
    public function getTransactionstate() {
        return $this->transactionstate;
    }

    /**
     * Set responsecode
     *
     * @param integer $responsecode
     *
     * @return Transactioninformation
     */
    public function setResponsecode($responsecode){
        $this->responsecode = $responsecode;

        return $this;
    }

    /**
     * Get responsecode
     *
     * @return integer
     */
    public function getResponsecode(){
        return $this->responsecode;
    }

    /**
     * Set responsereasoncode
     *
     * @param string $responsereasoncode
     *
     * @return Transactioninformation
     */
    public function setResponsereasoncode($responsereasoncode) {
        $this->responsereasoncode = $responsereasoncode;

        return $this;
    }

    /**
     * Get responsereasoncode
     *
     * @return string
     */
    public function getResponsereasoncode(){
        return $this->responsereasoncode;
    }

    /**
     * Set responsereasontext
     *
     * @param string $responsereasontext
     *
     * @return Transactioninformation
     */
    public function setResponsereasontext($responsereasontext) {
        $this->responsereasontext = $responsereasontext;

        return $this;
    }

    /**
     * Get responsereasontext
     *
     * @return string
     */
    public function getResponsereasontext(){
        return $this->responsereasontext;
    }
}
?>