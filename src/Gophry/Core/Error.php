<?php

namespace Gophry\Core;

use \Symfony\Component\HttpFoundation\JsonResponse;

use \Gophry\DTO\ResponseDTOInterface;

class Error {
    
    protected $propertyPath;

	protected $message;
    
	public function __construct($propertyPath, $message) {
		$this->propertyPath = $propertyPath;
		$this->message = $message;
	}
	
	public function getPropertyPath() {
		return $this->propertyPath;
	}

	public function getMessage() {
		return $this->message;
	}
	
}