<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use FundAmerica\Http\HttpClient;
use FundAmerica\Resources\Resource;
use RuntimeException;

abstract class Service
{
    protected const BASE_URL = 'https://apps.fundamerica.com/api/';
    protected const SANDBOX_BASE_URL = 'https://sandbox.fundamerica.com/api/';

    /**
     * @var array|static[]
     */
    private static array $instances;

    protected HttpClient $client;

    private function __construct(string $apiKey, bool $sandbox = false)
    {
        $baseUrl = $sandbox ? static::SANDBOX_BASE_URL : static::BASE_URL;

        $this->client = HttpClient::make($baseUrl, $apiKey);
    }

    private function __sleep()
    {
        throw new RuntimeException('FundAmerica Service instance cannot be serializable');
    }

    public static function make(string $apiKey, bool $sandbox = false): self
    {
        if (empty(static::$instances[static::class])) {
            static::$instances[static::class] = new static($apiKey, $sandbox);
        }

        return static::$instances[static::class];
    }

    /**
     * @param $response
     *
     * @return Resource
     */
    abstract protected function toResource($response): Resource;
}
