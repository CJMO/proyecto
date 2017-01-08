<?php

class Person{
    /* Propiedades de la clase Person */
    private $document;
    private $documenttype;
    private $firstname;
    private $lastname;
    private $company;   
    private $emailaddress;
	private $address;
	private $city;
    private $province;
	private $country;
	private $phone;   
    private $mobile;

	function __construct($datos){
		/* Asignar los valores de la clase por medio de la estructura del vector, el cual debe tener en el capo 'key' el mismo nombre que la propiedad de la clase */
		foreach($datos as $clave=>$valor){			
			$this->$clave = $valor;			
		}
	}

    /**
     * Set document
     *
     * @param string $document
     *
     * @return Person
     */
    public function setDocument($document){
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return string
     */
    public function getDocument(){
        return $this->document;
    }

    /**
     * Set documenttype
     *
     * @param string $documenttype: [CC, CE, TI, PPN]
     *
     * @return Person
     */
    public function setDocumenttype($documenttype){
        $this->documenttype = $documenttype;

        return $this;
    }

    /**
     * Get documenttype
     *
     * @return string
     */
    public function getDocumenttype(){
        return $this->documenttype;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Person
     */
    public function setFirstname($firstname){
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname(){
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Person
     */
    public function setLastname($lastname){
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname(){
        return $this->lastname;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Person
     */
    public function setCompany($company){
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany(){
        return $this->company;
    }

    /**
     * Set emailaddress
     *
     * @param string $emailaddress
     *
     * @return Person
     */
    public function setEmailaddress($emailaddress){
        $this->emailaddress = $emailaddress;

        return $this;
    }

    /**
     * Get emailaddress
     *
     * @return string
     */
    public function getEmailaddress(){
        return $this->emailaddress;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Person
     */
    public function setAddress($address){
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress(){
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Person
     */
    public function setCity($city){
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity(){
        return $this->city;
    }

    /**
     * Set province
     *
     * @param string $province
     *
     * @return Person
     */
    public function setProvince($province){
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return string
     */
    public function getProvince(){
        return $this->province;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Person
     */
    public function setCountry($country){
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry(){
        return $this->country;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Person
     */
    public function setPhone($phone){
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone(){
        return $this->phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Person
     */
    public function setMobile($mobile){
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile(){
        return $this->mobile;
    }
}
?>