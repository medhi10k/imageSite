<?php

namespace AppBundle\Service;


class UrlReaderService implements ContentReaderServiceInterface
{

    /**
     * Read the content path
     *
     * @param $contentPath
     * @return bool|string
     */
    public function read($contentPath)
    {
        return file_get_contents($contentPath);
    }
}