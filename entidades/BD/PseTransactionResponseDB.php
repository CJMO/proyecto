<?php
namespace Entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * Psetransactionresponse
 *
 * @Table(name="psetransactionresponse")
 * @Entity
 */
class PseTransactionResponseDB
{
    /**
     * @var integer
     *
     * @Column(name="transactionID", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $transactionid;

    /**
     * @var string
     *
     * @Column(name="sessionID", type="string", length=32, nullable=false)
     */
    private $sessionid;

    /**
     * @var string
     *
     * @Column(name="returnCode", type="string", length=30, nullable=false)
     */
    private $returncode;

    /**
     * @var string
     *
     * @Column(name="trazabilityCode", type="string", length=40, nullable=false)
     */
    private $trazabilitycode;

    /**
     * @var integer
     *
     * @Column(name="transactionCycle", type="integer", nullable=false)
     */
    private $transactioncycle;

    /**
     * @var string
     *
     * @Column(name="bankCurrency", type="string", length=3, nullable=false)
     */
    private $bankcurrency;

    /**
     * @var float
     *
     * @Column(name="bankFactor", type="float", precision=10, scale=0, nullable=false)
     */
    private $bankfactor;

    /**
     * @var string
     *
     * @Column(name="bankURL", type="string", length=255, nullable=false)
     */
    private $bankurl;

    /**
     * @var integer
     *
     * @Column(name="responseCode", type="integer", nullable=false)
     */
    private $responsecode;

    /**
     * @var string
     *
     * @Column(name="responseReasonCode", type="string", length=3, nullable=false)
     */
    private $responsereasoncode;

    /**
     * @var string
     *
     * @Column(name="responseReasonText", type="string", length=255, nullable=false)
     */
    private $responsereasontext;

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
     * Get transactionid
     *
     * @return integer
     */
    public function getTransactionid()
    {
        return $this->transactionid;
    }

    /**
     * Set sessionid
     *
     * @param string $sessionid
     *
     * @return Psetransactionresponse
     */
    public function setSessionid($sessionid)
    {
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