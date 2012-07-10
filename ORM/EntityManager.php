<?php

namespace Synd\FreshbooksBundle\ORM;

use Synd\FreshbooksBundle\Service\Freshbooks;
use Synd\FreshbooksBundle\Service\Call\ClientCall;
use Synd\FreshbooksBundle\Service\Call\InvoiceCall;
use Synd\FreshbooksBundle\Entity\Invoice;
use Synd\FreshbooksBundle\Entity\Client;
use Synd\FreshbooksBundle\Exception\EntityNotSupportedException;
use Synd\FreshbooksBundle\Serializer\SerializableEntityInterface;

class EntityManager
{
    protected $freshbooks;
    
    protected $calls;
    
    public function __construct(Freshbooks $freshbooks)
    {
        $this->freshbooks = $freshbooks;
        $this->calls = array();
    }
    
    /**
     * Persist a Freshbooks entity to Freshbooks
     * @param    Synd\FreshbooksBundle\Serializer\SerializableEntityInterface
     */
    public function persist(SerializableEntityInterface $entity)
    {
        $caller = $this->getCaller($entity);
        
        if ($entity->getId()) {
            $entity->setId($caller->create($entity));
        } else {
            $caller->update($entity);
        }
    }
    
    /**
     * Returns an object-specific Call object for a given entity
     * 
     * @param    Synd\FreshbooksBundle\Serializer\SerializableEntityInterface
     * @return   Synd\FreshbooksBundle\Serializer\SerializableEntityInterface
     * @throws   InvalidArgumentException when class is not supported
     */
    protected function getCaller($entity)
    {
        if (!empty($this->calls[$entity])) {
            return $this->calls[$entity];
        }
        
        if ($type instanceof Invoice) {
            return $this->calls[$entity] = new InvoiceCall($this->freshbooks);
        }
        
        if ($type instanceof Client) {
            return $this->calls[$entity] = new ClientCall($this->freshbooks);
        }
        
        throw new EntityNotSupportedException($entity);
    }
}