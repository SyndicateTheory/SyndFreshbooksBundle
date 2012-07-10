<?php

namespace Synd\FreshbooksBundle\Exception;

class EntityNotSupportedException extends \InvalidArgumentException
{
    public function __construct($entity)
    {
        $this->message = sprintf('"%s" is not a supported Freshbooks entity', get_class($entity));
    }
}