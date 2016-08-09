<?php

namespace Gophry\Core\Exception;

use \Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class AlreadyExistingResourceException extends ConflictHttpException implements IDataProviderException {
    
    private $data;
    
    public function __construct($message, $data = array()) {
        parent::__construct($message);
        $this->data = $data;
    }
    
    public function getData() {
        return $this->data;
    }
    
}