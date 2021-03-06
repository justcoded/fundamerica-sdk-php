<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use Generator;
use GuzzleHttp\Exception\GuzzleException;
use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use JustCoded\FundAmerica\Resources\Distribution;
use ReflectionException;

class DistributionsService extends Service
{
    /**
     * @param $response
     *
     * @return Distribution
     */
    protected function toResource($response): Distribution
    {
        return new Distribution($response);
    }

    /**
     * @param Distribution $distribution
     *
     * @return Distribution
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function create(Distribution $distribution): Distribution
    {
        $response = $this->client->post('distributions', $distribution->toArray());

        return $this->toResource($response);
    }

    /**
     * @param Distribution $distribution
     *
     * @return Distribution
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function update(Distribution $distribution): Distribution
    {
        $response = $this->client->patch("distributions/{$distribution->getId()}", $distribution->toArray());

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return Distribution
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function get(string $id): Distribution
    {
        $response = $this->client->get("distributions/{$id}");

        return $this->toResource($response);
    }

    public function all(): Generator
    {
        $page = 1;

        do {
            $response = $this->client->get("distributions?page={$page}");
            $page++;

            foreach ($response->resources as $resource) {
                yield $this->toResource($resource);
            }
        } while (! empty($response->resources));
    }

    /**
     * @return Distribution[]
     */
    public function allWithPagination(int $page = 1, int $per = 25): array
    {
        $response = $this->client->get("distributions?page={$page}&per={$per}");

        return $this->collect($response);
    }
}
