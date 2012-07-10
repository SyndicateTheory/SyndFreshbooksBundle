<?php

namespace Synd\FreshbooksBundle\Serializer;

interface SerializableEntityInterface
{
    function serialize();
    function unserialize($data);
}