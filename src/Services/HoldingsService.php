<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use GuzzleHttp\Exception\GuzzleException;
use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use JustCoded\FundAmerica\Resources\Holding;
use ReflectionException;

class HoldingsService extends Service
{
    /**
     * @param $response
     *
     * @return Holding
     */
    protected function toResource($response): Holding
    {
        return new Holding($response);
    }

    /**
     * @param Holding $security
     *
     * @return Holding
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function create(Holding $security): Holding
    {
        $response = $this->client->post('holdings', $security->toArray());

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return Holding
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function get(string $id): Holding
    {
        $response = $this->client->get("holdings/{$id}");

        return $this->toResource($response);
    }

    /**
     * @param Holding $security
     *
     * @return Holding
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function update(Holding $security): Holding
    {
        $response = $this->client->get("holdings/{$security->getId()}", $security->toArray());

        return $this->toResource($response);
    }
}
