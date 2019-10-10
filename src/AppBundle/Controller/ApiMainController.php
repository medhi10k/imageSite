<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiMainController extends Controller
{
    protected function responseOk($data = [], $headers = [])
    {
        $response = new JsonResponse($data);

        foreach($headers as $headerIndex => $headerValue) {
            $response->headers->set($headerIndex, $headerValue);
        }
        return $response;
    }
}