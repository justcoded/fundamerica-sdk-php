<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use FundAmerica\Exceptions\FundAmericaHttpException;
use FundAmerica\Resources\Offering;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class OfferingService extends Service
{
    /**
     * @param $response
     *
     * @return Offering
     * @throws ReflectionException
     */
    protected function toResource($response): Offering
    {
        return new Offering($response);
    }

    /**
     * @param Offering $offering
     *
     * @return Offering
     * @throws ReflectionException
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function create(Offering $offering): Offering
    {
        $response = $this->client->post('offerings', $offering->toArray());

        return $this->toResource($response);
    }

    /**
     * @param Offering $offering
     *
     * @return Offering
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function update(Offering $offering): Offering
    {
        $response = $this->client->patch("offerings/{$offering->getId()}", $offering->toArray());

        return $this->toResource($response);
    }

    /**
     * @param string $offeringId
     *
     * @return Offering
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function get(string $offeringId): Offering
    {
        $response = $this->client->get("offerings/{$offeringId}");

        return $this->toResource($response);
    }
}
