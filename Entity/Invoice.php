<?php

namespace Synd\FreshbooksBundle\Entity;

use Synd\FreshbooksBundle\Serializer\SerializableEntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fb_invoice")
 */
class Invoice implements SerializableEntityInterface
{
    const STATUS_DRAFT = 'draft';
    const STATUS_SENT = 'sent';
    const STATUS_VIEWED = 'viewed';
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    protected $client;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $number;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $status = self::STATUS_DRAFT;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $poNumber;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $discount = 0;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $notes;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $currencyCode;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $language = 'en';
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $terms;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $returnUri;
    
    /**
     * @ORM\OneToMany(targetEntity="LineItem", mappedBy="invoice")
     */
    protected $lines;
    
    public function __construct()
    {
        $this->lines = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Invoice
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Invoice
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set date
     *
     * @param datetime $date
     * @return Invoice
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set poNumber
     *
     * @param string $poNumber
     * @return Invoice
     */
    public function setPoNumber($poNumber)
    {
        $this->poNumber = $poNumber;
        return $this;
    }

    /**
     * Get poNumber
     *
     * @return string 
     */
    public function getPoNumber()
    {
        return $this->poNumber;
    }

    /**
     * Set discount
     *
     * @param integer $discount
     * @return Invoice
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * Get discount
     *
     * @return integer 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set notes
     *
     * @param text $notes
     * @return Invoice
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * Get notes
     *
     * @return text 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     * @return Invoice
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * Get currencyCode
     *
     * @return string 
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Invoice
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set terms
     *
     * @param text $terms
     * @return Invoice
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;
        return $this;
    }

    /**
     * Get terms
     *
     * @return text 
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set returnUri
     *
     * @param string $returnUri
     * @return Invoice
     */
    public function setReturnUri($returnUri)
    {
        $this->returnUri = $returnUri;
        return $this;
    }

    /**
     * Get returnUri
     *
     * @return string 
     */
    public function getReturnUri()
    {
        return $this->returnUri;
    }

    /**
     * Set client
     *
     * @param Synd\FreshbooksBundle\Entity\Client $client
     * @return Invoice
     */
    public function setClient(\Synd\FreshbooksBundle\Entity\Client $client = null)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Get client
     *
     * @return Synd\FreshbooksBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add lines
     *
     * @param Synd\FreshbooksBundle\Entity\LineItem $lines
     * @return Invoice
     */
    public function addLineItem(\Synd\FreshbooksBundle\Entity\LineItem $lines)
    {
        $this->lines[] = $lines;
        return $this;
    }

    /**
     * Get lines
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getLines()
    {
        return $this->lines;
    }
    
    /**
     * Flattens the Invoice to an array recognizable by Freshbooks
     * @return    array
     */
    public function serialize()
    {
        return array(
            'client_id'     => $this->getClient()->getId(),
            'contacts'      => array(),
            'number'        => $this->number,
            'status'        => $this->status,
            'date'          => $this->date->format('Y-m-d'),
            'po_number'     => $this->poNumber,
            'discount'      => $this->discount,
            'notes'         => $this->notes,
            'currency_code' => $this->currencyCode,
            'language'      => $this->language,
            'terms'         => $this->terms,
            'return_uri'    => $this->returnUri,
            'lines'         => array_map(function($item) { return $item->serialize(); }, $this->getItems())
        );
    }
    
    public function unserialize($data)
    {
        
    }
}