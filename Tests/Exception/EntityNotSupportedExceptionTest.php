<?php

namespace Synd\FreshbooksBundle\Tests\Exception;

use Synd\FreshbooksBundle\Exception\EntityNotSupportedException;

class EntityNotSupportedExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testMessageContainsClassName()
    {
        $entity = $this->getMock('Synd\FreshbooksBundle\Serializer\SerializableEntityInterface');
        $exception = new EntityNotSupportedException($entity);
        
        $this->assertContains(get_class($entity), $exception->getMessage());
    }
}