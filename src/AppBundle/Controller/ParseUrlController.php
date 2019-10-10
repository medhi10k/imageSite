<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Settings controller.
 *
 * @Route("/api")
 */
class ParseUrlController extends ApiMainController
{
    /**
     * @return JsonResponse
     * @Route("/v1/parse-image",name="api_v1_parse_image")
     * @Method("GET")
     */
    public function parseUrlAction(Request $request)
    {
        $url = $request->query->get('url', null);;
        if(empty($url) === true) {
            throw new AccessDeniedHttpException("bad-request");
        }

        $urlReader = $this->get('app_bundle.service.url_reader_service');
        $pregHtmlImageService = $this->get('app_bundle.service.preg_html_image_service');

        $htmlContent =  $urlReader->read($url);
        $images = $pregHtmlImageService->pregMatchAll($htmlContent);

        return $this->responseOk(['images' => $images]);
    }
}