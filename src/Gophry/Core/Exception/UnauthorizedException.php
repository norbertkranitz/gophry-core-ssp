<?php

namespace Gophry\Core\Exception;

use \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UnauthorizedException extends UnauthorizedHttpException implements IDataProviderException {
    
    private $data;
    
    public function __construct($message, $data = array()) {
        parent::__construct('No no no... nooo... Senior Superman no here... nooo...', $message);
        $this->data = $data;
    }
    
    public function getData() {
        return $this->data;
    }
    
}