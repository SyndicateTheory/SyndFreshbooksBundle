<?php

namespace Synd\FreshbooksBundle\Service\Call;

use Synd\FreshbooksBundle\Service\Freshbooks;
use Synd\FreshbooksBundle\Service\Call\CallInterface;
use Synd\FreshbooksBundle\Serializer\SerializableEntityInterface;

abstract class AbstractCall implements CallInterface
{
    /**
     * @var    Synd\FreshbooksBundle\Service\Freshbooks
     */
    protected $api;
    
    /**
     * Returns the Freshbooks object name for this type (ex: 'invoice')
     * @return    string        Object name
     */
    abstract public function getName();
    
    /**
     * Returns the Freshbooks id field for this type (ex: 'invoice_id')
     * @return    string        Object id field
     */
    abstract public function getIdField();

    
    public function __construct(Freshbooks $api)
    {
        $this->api = $api;
    }

    /**
     * Creates a new item and return its ID
     * 
     * @param    Synd\FreshbooksBundle\Serializer\SerializableEntityInterface
     * @return   integer   Newly created object id
     */
    public function create(SerializableEntityInterface $data)
    {
        $idField = $this->getIdField();
        
        return $this->api->request(
            $this->getMethod('create'), 
            $this->prepareArrayData($data),
            function ($response) use ($idField) { 
                return $response[$idField]; 
            }
        );
    }
    
    /**
     * Updates an item and returns status
     * 
     * @param    Synd\FreshbooksBundle\Serializer\SerializableEntityInterface
     * @return   boolean        True on success
     */
    public function update(SerializableEntityInterface $client)
    {
        return $this->api->request(
            $this->getMethod('update'), 
            $this->prepareArrayData($data),
            function ($response) {
                return $response['status'] === 'ok';
            } 
        );
    }
    
    /**
     * Deletes an item and returns status
     * 
     * @param    Synd\FreshbooksBundle\Serializer\SerializableEntityInterface
     * @return   boolean        True on success
     */
    public function delete($id)
    {
        return $this->api->request(
            $this->getMethod('delete'), 
            $this->prepareIntegerData($id),
            function ($response) {
                return $response['status'] === 'ok';
            }
        );
    }
    
    /**
     * Fetches information about an object
     * 
     * @param    Synd\FreshbooksBundle\Serializer\SerializableEntityInterface
     * @return   array        Object information
     */
    public function get($id)
    {
        $name = $this->getName();
        
        return $this->api->request(
            $this->getMethod('get'), 
            $this->prepareIntegerData($id),
            function($response) use ($name) {
                return $response[$name];
            }
        );
    }
    
    public function getList()
    {
        throw new \Exception('Pending');
    }
    
    /**
     * Generates the method name
     * @param    string        action being performed
     * @return   string        Freshbooks method name
     */
    protected function getMethod($action)
    {
        return sprintf('%s.%s', $this->getName(), $action);
    }
    
    /**
     * Wraps data in an array with the object name as the key
     * @param    Synd\FreshbooksBundle\Serializer\SerializableEntityInterface
     * @return   array('name' => serialized entity)
     */
    protected function prepareArrayData(SerializableEntityInterface $data)
    {
        return array($this->getName() => $data->serialize());
    }
    
    /**
     * Wraps the ID in an array with the id field as the key
     * @param    integer        Object ID to wrap
     * @return   array          array('id_field' => $id)
     */
    protected function prepareIntegerData($id)
    {
        return array($this->getIdField() => $id);
    }
}