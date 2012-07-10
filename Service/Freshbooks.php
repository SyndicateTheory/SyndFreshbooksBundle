<?php

namespace Synd\FreshbooksBundle\Service;

use Buzz\Browser;
use Symfony\Component\Serializer\Serializer;

class Freshbooks
{
    protected $browser;
    protected $serializer;
    protected $apiUrl;
    
    public function __construct(Browser $browser, Serializer $serializer, $apiUrl, $authToken)
    {
        $this->browser = $browser;
        $this->serializer = $serializer;
        $this->apiUrl = $apiUrl;
        
        $this->browser->getClient()->setOption(
            \CURLOPT_USERPWD,
            sprintf('%s:%s', $authToken, 'whatever')
        );
    }
    
    /**
     * Performs a Freshbooks API request on $method
     * @param    string        Method name (ex object.create)
     * @param    array         Data to pass
     * @return   Buzz\Message\Response
     */
    public function request($method, array $data, $callback = null)
    {
        $xml = $this->serializer->encode($data, 'xml');
        $xml = str_replace('<request>', '<request method="' . $method.  '">', $xml);
        
        $response = $this->browser->post($this->apiUrl, $xml);
        
        if (!$response->isOk()) {
            throw new \Exception('Ruh Roh', null, 
        }
        
        
        $response = $this->serializer->decode($response, 'xml');
        
        return $callback ? $response : $callback($response);
    }
}