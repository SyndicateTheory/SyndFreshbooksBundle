<?php

namespace Synd\FreshbooksBundle\EventListener;

use Synd\FreshbooksBundle\ORM\EntityManager as FreshbooksEntityManager;
use Synd\FreshbooksBundle\Serializer\SerializableEntityInterface;

class UpdateFreshbooks
{
    protected $freshbooks;
    
    public function __construct(FreshbooksEntityManager $fresshbooks)
    {
        $this->freshbooks = $freshbooks;
    }
    
    public function onFlush(OnFlushEventArgs $eventArgs)
    {
        $em = $eventArgs->getEntityManager();
        $uow = $em->getUnitOfWork();
        
        foreach ($uow->getScheduledEntityInsertions() as $entity) {
            if ($entity instanceof SerializableEntityInterface) {
                $this->freshbooks->persist($entity);
            }
        }
        
        foreach ($uow->getScheduledEntityUpdatesS() as $entity) {
            if ($entity instanceof SerializableEntityInterface) {
                $this->freshbooks->persist($entity);
            }
        }
    }
}