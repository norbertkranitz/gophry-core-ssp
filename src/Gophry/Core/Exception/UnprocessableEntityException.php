<?php

namespace Gophry\Core\Exception;

use \Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class UnprocessableEntityException extends UnprocessableEntityHttpException implements IDataProviderException {
    
    private $data;
    
    public function __construct($message, $data = array()) {
        parent::__construct($message);
        $this->data = $data;
    }
    
    public function getData() {
        return $this->data;
    }
    
}