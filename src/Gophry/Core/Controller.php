<?php

namespace Gophry\Core;

use \Symfony\Component\HttpFoundation\JsonResponse;

use \Gophry\DTO\ResponseDTOInterface;

abstract class Controller {
    
    protected $user;
    
    private function response($dto, $status = JsonResponse::HTTP_OK) {
        $result = null;
        if (is_array($dto)) {
            foreach($dto as &$item) {
                $result[] = ($item instanceof ResponseDTOInterface) ? $item->toArray() : $item;
            }
        } else {
            $result = ($dto instanceof ResponseDTOInterface) ? $dto->toArray() : $dto;
        }
        
        return new JsonResponse($result, $result === null ? JsonResponse::HTTP_NO_CONTENT : $status);
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