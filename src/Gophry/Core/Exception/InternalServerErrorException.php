<?php

namespace Gophry\Core\Exception;

use \Symfony\Component\HttpKernel\Exception\HttpException;

class InternalServerErrorException extends HttpException {
        
    public function __construct($message = null, \Exception $previous = null, $code = 0)
    {
        parent::__construct(500, $message, $previous, array(), $code);
    }
}