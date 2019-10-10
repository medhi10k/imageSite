<?php

namespace AppBundle\Service;


class PregHtmlImageService implements PregServiceInterface
{
    /**
     * Preg match all the pattern on the content
     *
     * @param $content
     * @return mixed
     */
    public function pregMatchAll($content)
    {
        preg_match_all('#<img[^>]*>#', $content, $matches);

        return $matches[0];
    }
}