<?php
namespace Entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * Transactioninformation
 *
 * @Table(name="transactioninformation")
 * @Entity
 */
class TransactionInformationDB
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
     * @Column(name="reference", type="string", length=32, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @Column(name="requestDate", type="string", length=40, nullable=false)
     */
    private $requestdate;

    /**
     * @var string
     *
     * @Column(name="bankProcessDate", type="string", length=40, nullable=false)
     */
    private $bankprocessdate;

    /**
     * @var boolean
     *
     * @Column(name="onTest", type="boolean", nullable=false)
     */
    private $ontest;

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
     * @Column(name="transactionState", type="string", length=20, nullable=false)
     */
    private $transactionstate;

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
     * @return Transactioninformation
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
     * Set reference
     *
     * @param string $reference
     *
     * @return Transactioninformation
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set requestdate
     *
     * @param string $requestdate
     *
     * @return Transactioninformation
     */
    public function setRequestdate($requestdate)
    {
        $this->requestdate = $requestdate;

        return $this;
    }

    /**
     * Get requestdate
     *
     * @return string
     */
    public function getRequestdate()
    {
        return $this->requestdate;
    }

    /**
     * Set bankprocessdate
     *
     * @param string $bankprocessdate
     *
     * @return Transactioninformation
     */
    public function setBankprocessdate($bankprocessdate)
    {
        $this->bankprocessdate = $bankprocessdate;

        return $this;
    }

    /**
     * Get bankprocessdate
     *
     * @return string
     */
    public function getBankprocessdate()
    {
        return $this->bankprocessdate;
    }

    /**
     * Set ontest
     *
     * @param boolean $ontest
     *
     * @return Transactioninformation
     */
    public function setOntest($ontest)
    {
        $this->ontest = $ontest;

        return $this;
    }

    /**
     * Get ontest
     *
     * @return boolean
     */
    public function getOntest()
    {
        return $this->ontest;
    }

    /**
     * Set returncode
     *
     * @param string $returncode
     *
     * @return Transactioninformation
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
     * @return Transactioninformation
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
     * @return Transactioninformation
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
     * Set transactionstate
     *
     * @param string $transactionstate
     *
     * @return Transactioninformation
     */
    public function setTransactionstate($transactionstate)
    {
        $this->transactionstate = $transactionstate;

        return $this;
    }

    /**
     * Get transactionstate
     *
     * @return string
     */
    public function getTransactionstate()
    {
        return $this->transactionstate;
    }

    /**
     * Set responsecode
     *
     * @param integer $responsecode
     *
     * @return Transactioninformation
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
     * @return Transactioninformation
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
     * @return Transactioninformation
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
