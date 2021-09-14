<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use GuzzleHttp\Exception\GuzzleException;
use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use JustCoded\FundAmerica\Resources\AmlException;
use JustCoded\FundAmerica\Resources\Entity;
use JustCoded\FundAmerica\Resources\Investment;
use ReflectionException;

class AmlExceptionsService extends Service
{
    /**
     * @param $response
     *
     * @return AmlException
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    protected function toResource($response): AmlException
    {
        $resource = new AmlException($response);

        if ($resource->entity_url) {
            $resource->entity = new Entity($this->client->get($resource->entity_url));
        }

        if ($resource->investment_url) {
            $resource->investment = new Investment($this->client->get($resource->investment_url));
        }

        return $resource;
    }

    /**
     * @param string $id
     *
     * @return AmlException
     * @throws GuzzleException
     * @throws FundAmericaHttpException
     */
    public function get(string $id): AmlException
    {
        $response = $this->client->get("aml_exceptions/{$id}");

        return $this->toResource($response);
    }

    /**
     * @param AmlException $amlException
     *
     * @return AmlException
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function update(AmlException $amlException): AmlException
    {
        $response = $this->client->patch("aml_exceptions/{$amlException->getId()}", $amlException->toArray());

        return $this->toResource($response);
    }
}
