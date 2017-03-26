<?php

namespace Gophry\Core;

use \Symfony\Component\HttpFoundation\JsonResponse;

use \Gophry\DTO\ResponseDTOInterface;

abstract class Controller {
    
    protected $user;
    
    private function response($dto, $status = JsonResponse::HTTP_OK) {
        $result = null;
        if (is_array($dto)) {
			$result = [];
            foreach($dto as &$item) {
                $result[] = ($item instanceof ResponseDTOInterface) ? $item->toArray() : $item;
            }
        } else {
            $result = ($dto instanceof ResponseDTOInterface) ? $dto->toArray() : $dto;
        }
        
        $response = new JsonResponse();
        $response->setCharset('UTF-8');
        $response->setData($result);
        $response->setStatusCode($status);
        return $response;
    }
    
    protected function ok($dto = null) {
        return $this->response($dto, JsonResponse::HTTP_OK);
    }
    
    protected function created($dto = null) {
        return $this->response($dto, JsonResponse::HTTP_CREATED);
    }
    
    protected function accepted($dto = null) {
        return $this->response($dto, JsonResponse::HTTP_ACCEPTED);
    }
    
    public function setAuthenticatedUser($user) {
        $this->user = $user;
        return $this;
    }
    
}