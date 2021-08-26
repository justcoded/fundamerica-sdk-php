<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use JustCoded\FundAmerica\Http\ConnectionConfig;
use JustCoded\FundAmerica\Http\HttpClient;
use JustCoded\FundAmerica\Resources\Resource;
use RuntimeException;

abstract class Service
{
    protected HttpClient $client;

    /**
     * @param ConnectionConfig $config
     */
    private function __construct(ConnectionConfig $config)
    {
        $this->client = HttpClient::make($config);
    }

    /**
     * @inerhitDoc
     */
    public function __sleep(): void
    {
        throw new RuntimeException('FundAmerica Service instance cannot be serializable');
    }

    /**
     * @param ConnectionConfig $config
     *
     * @return static
     */
    public static function make(ConnectionConfig $config): self
    {
        return new static($config);
    }

    /**
     * @param $response
     *
     * @return Resource
     */
    abstract protected function toResource($response): Resource;
}
