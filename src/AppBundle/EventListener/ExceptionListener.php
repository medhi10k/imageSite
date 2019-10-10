<?php

namespace AppBundle\EventListener;

use AppBundle\Exception\ApiException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if($exception instanceof ApiException) {
            $response = new JsonResponse(['error' => $exception->getMessage()]);
            
            $event->setResponse($response);
        }
    }
}