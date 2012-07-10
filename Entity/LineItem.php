<?php

namespace Synd\FreshbooksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fb_invoice_item")
 */
class LineItem
{
    const TYPE_TIME = 'Time';
    const TYPE_ITEM = 'Item';
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Invoice")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id")
     */
    protected $invoice;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $description;
    
    /**
     * @ORM\Column(type="decimal", precision=2)
     */
    protected $cost;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $quantity;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $tax1Name;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $tax1Percent;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $tax2Name;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $tax2Percent;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $type;

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
     * Set name
     *
     * @param string $name
     * @return LineItem
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     * @return LineItem
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set cost
     *
     * @param decimal $cost
     * @return LineItem
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * Get cost
     *
     * @return decimal 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return LineItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set tax1Name
     *
     * @param string $tax1Name
     * @return LineItem
     */
    public function setTax1Name($tax1Name)
    {
        $this->tax1Name = $tax1Name;
        return $this;
    }

    /**
     * Get tax1Name
     *
     * @return string 
     */
    public function getTax1Name()
    {
        return $this->tax1Name;
    }

    /**
     * Set tax1Percent
     *
     * @param integer $tax1Percent
     * @return LineItem
     */
    public function setTax1Percent($tax1Percent)
    {
        $this->tax1Percent = $tax1Percent;
        return $this;
    }

    /**
     * Get tax1Percent
     *
     * @return integer 
     */
    public function getTax1Percent()
    {
        return $this->tax1Percent;
    }

    /**
     * Set tax2Name
     *
     * @param string $tax2Name
     * @return LineItem
     */
    public function setTax2Name($tax2Name)
    {
        $this->tax2Name = $tax2Name;
        return $this;
    }

    /**
     * Get tax2Name
     *
     * @return string 
     */
    public function getTax2Name()
    {
        return $this->tax2Name;
    }

    /**
     * Set tax2Percent
     *
     * @param integer $tax2Percent
     * @return LineItem
     */
    public function setTax2Percent($tax2Percent)
    {
        $this->tax2Percent = $tax2Percent;
        return $this;
    }

    /**
     * Get tax2Percent
     *
     * @return integer 
     */
    public function getTax2Percent()
    {
        return $this->tax2Percent;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return LineItem
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set invoice
     *
     * @param Synd\FreshbooksBundle\Entity\Invoice $invoice
     * @return LineItem
     */
    public function setInvoice(\Synd\FreshbooksBundle\Entity\Invoice $invoice = null)
    {
        $this->invoice = $invoice;
        return $this;
    }

    /**
     * Get invoice
     *
     * @return Synd\FreshbooksBundle\Entity\Invoice 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }
}