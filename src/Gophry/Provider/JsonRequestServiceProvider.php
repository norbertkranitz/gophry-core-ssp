<?php

namespace Application\Components\Core;

use \Symfony\Component\HttpFoundation\Request;

use \Pimple\Container;
use \Pimple\ServiceProviderInterface;

class JsonRequestServiceProvider implements ServiceProviderInterface {

    public function register(Container $app) {
        $app->before(function (Request $request) {
            if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
                $data = json_decode($request->getContent(), true);
                $request->request->replace(is_array($data) ? $data : array());
            }
        });
    }

}
