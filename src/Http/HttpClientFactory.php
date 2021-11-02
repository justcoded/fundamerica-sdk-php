<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Http;

class HttpClientFactory
{
    protected ConnectionConfig $connectionConfig;

    public function __construct(ConnectionConfig $connectionConfig)
    {
        $this->connectionConfig = $connectionConfig;
    }

    public function make(): HttpClientInterface
    {
        return $this->connectionConfig->getHttpClient()::make(
            $this->connectionConfig->getBaseUrl(),
            $this->connectionConfig->getApiKey()
        );
    }
}
