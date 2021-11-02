<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use JustCoded\FundAmerica\Http\ConnectionConfig;
use JustCoded\FundAmerica\Http\HttpClientInterface;
use JustCoded\FundAmerica\Resources\Resource;
use RuntimeException;

abstract class Service
{
    protected HttpClientInterface $client;

    /**
     * @param ConnectionConfig $config
     */
    private function __construct(ConnectionConfig $config)
    {
        $this->client = $config->getHttpClient();
    }

    /**
     * @inerhitDoc
     */
    public function __sleep(): array
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

    /**
     * @param $response
     *
     * @return Resource[]
     */
    public function collect($response): array
    {
        if ($response->object !== 'resource_list') {
            throw new RuntimeException('Unsupported response type for collection');
        }

        $result = [];
        foreach ($response->resources as $resource) {
            $result[] = $this->toResource($resource);
        }

        return $result;
    }
}
