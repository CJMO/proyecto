<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Bank
 *
 * @Table(name="bank")
 * @Entity
 */
class BankDB
{
    /**
     * @var string
     *
     * @Column(name="bankCode", type="string", length=4, nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $bankcode;

    /**
     * @var string
     *
     * @Column(name="bankName", type="string", length=60, nullable=false)
     */
    private $bankname;


    /**
     * Get bankcode
     *
     * @return string
     */
    public function getBankcode()
    {
        return $this->bankcode;
    }

    /**
     * Set bankname
     *
     * @param string $bankname
     *
     * @return Bank
     */
    public function setBankname($bankname)
    {
        $this->bankname = $bankname;

        return $this;
    }

    /**
     * Get bankname
     *
     * @return string
     */
    public function getBankname()
    {
        return $this->bankname;
    }
}
