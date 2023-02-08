<?php

namespace App\Service;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class JsonService
{
    private const ERROR_INVALID_JSON = "Invalid Json.";

    public function decodeJson(string $content): array
    {
        $parameters = [];
        if (!($parameters = json_decode($content, true))) {
            throw new BadRequestHttpException(self::ERROR_INVALID_JSON);
        }
        
        return $parameters;
    }
}