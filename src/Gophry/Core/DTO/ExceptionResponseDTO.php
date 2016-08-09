<?php

namespace Gophry\Core\DTO;

use \Gophry\DTO\ResponseDTO;

class ExceptionResponseDTO extends ResponseDTO {
    
    protected $message;
    
    protected $data;
    
    public function setMessage($message) {
        $this->message = $message;
    }

    public function setData(array $data) {
        $this->data = $data;
    }
    
}
