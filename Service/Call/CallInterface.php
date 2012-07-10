<?php

namespace Synd\FreshbooksBundle\Service\Call;

use Synd\FreshbooksBundle\Serializer\SerializableEntityInterface;

interface CallInterface
{
    function create(SerializableEntityInterface $entity);
    function update(SerializableEntityInterface $entity);
    function delete($id);
    function get($id);
    function getList();
}