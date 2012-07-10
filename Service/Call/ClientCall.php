<?php

namespace Synd\FreshbooksBundle\Service\Call;

use Synd\FreshbooksBundle\Service\Call\AbstractCall;

class ClientCall extends AbstractCall
{
    public function getName()
    {
        return 'client';
    }
    
    public function getIdField()
    {
        return 'client_id';
    }
}