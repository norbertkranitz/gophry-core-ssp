<?php

namespace Gophry\Provider;

use \Symfony\Component\HttpFoundation\JsonResponse;
use \Symfony\Component\HttpFoundation\Request;

use \Pimple\Container;
use \Pimple\ServiceProviderInterface;

use \Gophry\Core\DTO\ExceptionResponseDTO;
use \Gophry\Core\Exception\IDataProviderException;

class ExceptionHandlerServiceProvider implements ServiceProviderInterface {

    public function register(Container $app) {
        $app->error(function (\Exception $e, Request $request, $code) use ($app) { 
            $dto = new ExceptionResponseDTO();
            $dto->setMessage($e->getMessage());
            $statusCode = JsonResponse::HTTP_INTERNAL_SERVER_ERROR;
            
            if ($e instanceof IDataProviderException) {
                $data = $e->getData();
                $statusCode = $e->getStatusCode();
                if ($statusCode === JsonResponse::HTTP_UNPROCESSABLE_ENTITY) {
                    $list = [];
                    foreach ($data as $error) {
                        $key = $error->getPropertyPath();
                        if (!array_key_exists($key, $list)) {
                            $list[$key] = [];    
                        }
                        $list[$key][] = $error->getMessage();
                    }
                    $data = $list;
                }
                $dto->setData($data);
            }
            return new JsonResponse($dto->toArray(), $statusCode);
        });
    }

}


