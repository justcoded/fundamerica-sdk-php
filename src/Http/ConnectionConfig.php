<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Http;

class ConnectionConfig
{
    protected const BASE_URL = 'https://apps.fundamerica.com/api/';
    protected const SANDBOX_BASE_URL = 'https://sandbox.fundamerica.com/api/';

    protected string $baseUrl;
    protected string $apiKey;

    /**
     * @param string $apiKey
     * @param bool $sandbox
     */
    public function __construct(string $apiKey, bool $sandbox = false)
    {
        $this->baseUrl = $sandbox ? static::SANDBOX_BASE_URL : static::BASE_URL;
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }
}
