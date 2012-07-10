<?php

namespace Synd\FreshbooksBundle\EventListener;

class UpdateFreshbooks
{
    protected $freshbooks;
    
    public function __construct(Freshbooks $fresshbooks)
    {
        $this->freshbooks = $freshbooks;
    }
    
    public function onFlush(OnFlushEventArgs $eventArgs)
    {
        $em = $eventArgs->getEntityManager();
        $uow = $em->getUnitOfWork();
        
        foreach ($uow->getScheduledEntityInsertions() as $entity) {
            $this->freshbooks->persist($entity);
        }
        
        foreach ($uow->getScheduledEntityUpdatesS() as $entity) {
            $this->freshbooks->persist($entity);
        }
    }
}