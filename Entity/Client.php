<?php

namespace Synd\FreshbooksBundle\Entity;

use Synd\FreshbooksBundle\Serializer\SerializableEntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fb_client")
 */
class Client implements SerializableEntityInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $first_name;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $last_name;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $organization;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $email;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $username;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $password;
    
    protected $contacts; // ??
    
    /**
     * @ORM\Column(type="string")
     */
    protected $work_phone;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $home_phone;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $mobile;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $fax;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $language;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $currency_code;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $notes;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $p_street1;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $p_street2;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $p_city;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $p_state;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $p_country;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $p_code;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $s_street1;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $s_street2;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $s_city;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $s_state;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $s_country;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $s_code;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $vat_name;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $vat_number;

    /**
     * Set id
     *
     * @param integer $id
     * @return Client
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * Set first_name
     *
     * @param string $firstName
     * @return Client
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Client
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set organization
     *
     * @param string $organization
     * @return Client
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
        return $this;
    }

    /**
     * Get organization
     *
     * @return string 
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Client
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Client
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Client
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set work_phone
     *
     * @param string $workPhone
     * @return Client
     */
    public function setWorkPhone($workPhone)
    {
        $this->work_phone = $workPhone;
        return $this;
    }

    /**
     * Get work_phone
     *
     * @return string 
     */
    public function getWorkPhone()
    {
        return $this->work_phone;
    }

    /**
     * Set home_phone
     *
     * @param string $homePhone
     * @return Client
     */
    public function setHomePhone($homePhone)
    {
        $this->home_phone = $homePhone;
        return $this;
    }

    /**
     * Get home_phone
     *
     * @return string 
     */
    public function getHomePhone()
    {
        return $this->home_phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Client
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Client
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Client
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
     * Set currency_code
     *
     * @param string $currencyCode
     * @return Client
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currency_code = $currencyCode;
        return $this;
    }

    /**
     * Get currency_code
     *
     * @return string 
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    /**
     * Set notes
     *
     * @param text $notes
     * @return Client
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
     * Set p_street1
     *
     * @param string $pStreet1
     * @return Client
     */
    public function setPStreet1($pStreet1)
    {
        $this->p_street1 = $pStreet1;
        return $this;
    }

    /**
     * Get p_street1
     *
     * @return string 
     */
    public function getPStreet1()
    {
        return $this->p_street1;
    }

    /**
     * Set p_street2
     *
     * @param string $pStreet2
     * @return Client
     */
    public function setPStreet2($pStreet2)
    {
        $this->p_street2 = $pStreet2;
        return $this;
    }

    /**
     * Get p_street2
     *
     * @return string 
     */
    public function getPStreet2()
    {
        return $this->p_street2;
    }

    /**
     * Set p_city
     *
     * @param string $pCity
     * @return Client
     */
    public function setPCity($pCity)
    {
        $this->p_city = $pCity;
        return $this;
    }

    /**
     * Get p_city
     *
     * @return string 
     */
    public function getPCity()
    {
        return $this->p_city;
    }

    /**
     * Set p_state
     *
     * @param string $pState
     * @return Client
     */
    public function setPState($pState)
    {
        $this->p_state = $pState;
        return $this;
    }

    /**
     * Get p_state
     *
     * @return string 
     */
    public function getPState()
    {
        return $this->p_state;
    }

    /**
     * Set p_country
     *
     * @param string $pCountry
     * @return Client
     */
    public function setPCountry($pCountry)
    {
        $this->p_country = $pCountry;
        return $this;
    }

    /**
     * Get p_country
     *
     * @return string 
     */
    public function getPCountry()
    {
        return $this->p_country;
    }

    /**
     * Set p_code
     *
     * @param string $pCode
     * @return Client
     */
    public function setPCode($pCode)
    {
        $this->p_code = $pCode;
        return $this;
    }

    /**
     * Get p_code
     *
     * @return string 
     */
    public function getPCode()
    {
        return $this->p_code;
    }

    /**
     * Set s_street1
     *
     * @param string $sStreet1
     * @return Client
     */
    public function setSStreet1($sStreet1)
    {
        $this->s_street1 = $sStreet1;
        return $this;
    }

    /**
     * Get s_street1
     *
     * @return string 
     */
    public function getSStreet1()
    {
        return $this->s_street1;
    }

    /**
     * Set s_street2
     *
     * @param string $sStreet2
     * @return Client
     */
    public function setSStreet2($sStreet2)
    {
        $this->s_street2 = $sStreet2;
        return $this;
    }

    /**
     * Get s_street2
     *
     * @return string 
     */
    public function getSStreet2()
    {
        return $this->s_street2;
    }

    /**
     * Set s_city
     *
     * @param string $sCity
     * @return Client
     */
    public function setSCity($sCity)
    {
        $this->s_city = $sCity;
        return $this;
    }

    /**
     * Get s_city
     *
     * @return string 
     */
    public function getSCity()
    {
        return $this->s_city;
    }

    /**
     * Set s_state
     *
     * @param string $sState
     * @return Client
     */
    public function setSState($sState)
    {
        $this->s_state = $sState;
        return $this;
    }

    /**
     * Get s_state
     *
     * @return string 
     */
    public function getSState()
    {
        return $this->s_state;
    }

    /**
     * Set s_country
     *
     * @param string $sCountry
     * @return Client
     */
    public function setSCountry($sCountry)
    {
        $this->s_country = $sCountry;
        return $this;
    }

    /**
     * Get s_country
     *
     * @return string 
     */
    public function getSCountry()
    {
        return $this->s_country;
    }

    /**
     * Set s_code
     *
     * @param string $sCode
     * @return Client
     */
    public function setSCode($sCode)
    {
        $this->s_code = $sCode;
        return $this;
    }

    /**
     * Get s_code
     *
     * @return string 
     */
    public function getSCode()
    {
        return $this->s_code;
    }

    /**
     * Set vat_name
     *
     * @param string $vatName
     * @return Client
     */
    public function setVatName($vatName)
    {
        $this->vat_name = $vatName;
        return $this;
    }

    /**
     * Get vat_name
     *
     * @return string 
     */
    public function getVatName()
    {
        return $this->vat_name;
    }

    /**
     * Set vat_number
     *
     * @param string $vatNumber
     * @return Client
     */
    public function setVatNumber($vatNumber)
    {
        $this->vat_number = $vatNumber;
        return $this;
    }

    /**
     * Get vat_number
     *
     * @return string 
     */
    public function getVatNumber()
    {
        return $this->vat_number;
    }
    
    public function serialize()
    {
        return array(
            'client_id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name
        );
    }
    
    public function unserialize($data)
    {
        
    }
}