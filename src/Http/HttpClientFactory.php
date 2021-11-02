<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Http;

class HttpClientFactory
{

    public static function make(ConnectionConfig $connectionConfig): HttpClientInterface
    {
        return $connectionConfig->getHttpClient()::make(
            $connectionConfig->getBaseUrl(),
            $connectionConfig->getApiKey()
        );
    }
}
