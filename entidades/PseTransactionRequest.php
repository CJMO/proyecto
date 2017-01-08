<?php

/**
 * Clase PseTransactionRequest
 */
 
//require_once('Attribute.php');
 
class PseTransactionRequest{
  
    private $reference;
    private $bankcode;
    private $bankinterface;   
    private $returnurl;
    private $description;
    private $language;
    private $currency;
    private $totalamount;
    private $taxamount;
    private $devolutionbase;
    private $tipamount;
    private $ipaddress;
    private $useragent;
    private $additionaldata;
	
	/* Estructuras adicionales de tipo Person */
	private $payer;
	private $buyer;
	private $shipping;
	
	/**
    * Get payer
    *
    * @return Person
    */
    public function getPayer(){
        return $this->payer;
    }
	
	/**
    * Set payer
    *
    * @param Person $payer
    *
    * @return Psetransactionrequest
    */
    public function setPayer($payer){
        $this->payer = $payer;

        return $this;
    }
	
	/**
    * Get buyer
    *
    * @return Person
    */
    public function getBuyer(){
        return $this->buyer;
    }
	
	/**
    * Set buyer
    *
    * @param Person $buyer
    *
    * @return Psetransactionrequest
    */
    public function setBuyer($buyer){
        $this->buyer = $buyer;

        return $this;
    }
	
	/**
    * Get shipping
    *
    * @return Person
    */
    public function getShipping(){
        return $this->shipping;
    }
	
	/**
    * Set shipping
    *
    * @param Person $shipping
    *
    * @return Psetransactionrequest
    */
    public function setShipping($shipping){
        $this->shipping = $shipping;

        return $this;
    }
	
	/**
     * Set reference
     *
     * @param string $reference
     *
     * @return Psetransactionrequest
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
     * Set bankcode
     *
     * @param string $bankcode
     *
     * @return Psetransactionrequest
     */
    public function setBankcode($bankcode){
        $this->bankcode = $bankcode;

        return $this;
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
     * Set bankinterface
     *
     * @param string $bankinterface
     *
     * @return Psetransactionrequest
     */
    public function setBankinterface($bankinterface){
        $this->bankinterface = $bankinterface;

        return $this;
    }

    /**
     * Get bankinterface
     *
     * @return string
     */
    public function getBankinterface(){
        return $this->bankinterface;
    }

    /**
     * Set returnurl
     *
     * @param string $returnurl
     *
     * @return Psetransactionrequest
     */
    public function setReturnurl($returnurl){
        $this->returnurl = $returnurl;

        return $this;
    }

    /**
     * Get returnurl
     *
     * @return string
     */
    public function getReturnurl(){
        return $this->returnurl;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Psetransactionrequest
     */
    public function setDescription($description){
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return Psetransactionrequest
     */
    public function setLanguage($language){
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage(){
        return $this->language;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Psetransactionrequest
     */
    public function setCurrency($currency){
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency(){
        return $this->currency;
    }

    /**
     * Set totalamount
     *
     * @param float $totalamount
     *
     * @return Psetransactionrequest
     */
    public function setTotalamount($totalamount){
        $this->totalamount = $totalamount;

        return $this;
    }

    /**
     * Get totalamount
     *
     * @return float
     */
    public function getTotalamount(){
        return $this->totalamount;
    }

    /**
     * Set taxamount
     *
     * @param float $taxamount
     *
     * @return Psetransactionrequest
     */
    public function setTaxamount($taxamount){
        $this->taxamount = $taxamount;

        return $this;
    }

    /**
     * Get taxamount
     *
     * @return float
     */
    public function getTaxamount(){
        return $this->taxamount;
    }

    /**
     * Set devolutionbase
     *
     * @param float $devolutionbase
     *
     * @return Psetransactionrequest
     */
    public function setDevolutionbase($devolutionbase){
        $this->devolutionbase = $devolutionbase;

        return $this;
    }

    /**
     * Get devolutionbase
     *
     * @return float
     */
    public function getDevolutionbase(){
        return $this->devolutionbase;
    }

    /**
     * Set tipamount
     *
     * @param float $tipamount
     *
     * @return Psetransactionrequest
     */
    public function setTipamount($tipamount){
        $this->tipamount = $tipamount;

        return $this;
    }

    /**
     * Get tipamount
     *
     * @return float
     */
    public function getTipamount(){
        return $this->tipamount;
    }

    /**
     * Set ipaddress
     *
     * @param string $ipaddress
     *
     * @return Psetransactionrequest
     */
    public function setIpaddress($ipaddress){
        $this->ipaddress = $ipaddress;

        return $this;
    }

    /**
     * Get ipaddress
     *
     * @return string
     */
    public function getIpaddress(){
        return $this->ipaddress;
    }

    /**
     * Set useragent
     *
     * @param string $useragent
     *
     * @return Psetransactionrequest
     */
    public function setUseragent($useragent){
        $this->useragent = $useragent;

        return $this;
    }

    /**
     * Get useragent
     *
     * @return string
     */
    public function getUseragent(){
        return $this->useragent;
    }

    /**
     * Set additionaldata
     *
     * @param Attribute $additionaldata
     *
     * @return Psetransactionrequest
     */
    public function setAdditionaldata($additionaldata){
        $this->additionaldata = $additionaldata;

        return $this;
    }

    /**
     * Get additionaldata
     *
     * @return Attribute
     */
    public function getAdditionaldata(){
        return $this->additionaldata;
    }
}
?>