<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use GuzzleHttp\Exception\GuzzleException;
use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use JustCoded\FundAmerica\Resources\Security;
use ReflectionException;

class SecuritiesService extends Service
{
    /**
     * @param $response
     *
     * @return Security
     */
    protected function toResource($response): Security
    {
        return new Security($response);
    }

    /**
     * @param Security $security
     *
     * @return Security
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function create(Security $security): Security
    {
        $response = $this->client->post('securities', $security->toArray());

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return Security
     * @throws GuzzleException
     * @throws FundAmericaHttpException
     */
    public function get(string $id): Security
    {
        $response = $this->client->get("securities/{$id}");

        return $this->toResource($response);
    }

    /**
     * @param Security $security
     *
     * @return Security
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function update(Security $security): Security
    {
        $response = $this->client->get("securities/{$security->getId()}", $security->toArray());

        return $this->toResource($response);
    }
}
