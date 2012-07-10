<?php

namespace Synd\FreshbooksBundle\Tests\Service\Call;

use Synd\FreshbooksBundle\Service\Freshbooks;
use Synd\FreshbooksBundle\Entity\Client;
use Synd\FreshbooksBundle\Service\Call\ClientCall;
use Buzz\Client\Curl;
use Buzz\Browser;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Serializer;

class ClientCallTest extends \PHPUnit_Framework_TestCase
{
    public function testIt()
    {
        $client = new Client();
        $client
            ->setFirstName('Adrian')
            ->setLastName('Schneider')
        ;
        
        $browser = new Browser(new Curl());
        
        $freshbooks = new Freshbooks(
            $browser,
            new Serializer(array(), array($encoder = new XmlEncoder())),
            'https://test.freshbooks.com/api/2.1/xml-in',
            md5('yoyoma')
        );
        
        $encoder->setRootNodeName('request');
        
        
        $call = new ClientCall($freshbooks);
        $call->create($client);
    }
}