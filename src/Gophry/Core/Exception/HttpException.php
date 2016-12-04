<?php

namespace Gophry\Core\Exception;

use \Symfony\Component\HttpKernel\Exception\HttpException as BaseHttpException;

class HttpException extends BaseHttpException implements IDataProviderException {
    
    private $data;
    
    public function __construct($status, $message, $data = array()) {
        parent::__construct($status, $message);
        $this->data = $data;
    }
    
    public function getData() {
        return $this->data;
    }
    
}
