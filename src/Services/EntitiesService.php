<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use JustCoded\FundAmerica\Resources\Entity;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class EntitiesService extends Service
{
    /**
     * @param $response
     *
     * @return Entity
     */
    protected function toResource($response): Entity
    {
        return new Entity($response);
    }

    /**
     * @param string $id
     *
     * @return Entity
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function get(string $id): Entity
    {
        $response = $this->client->get("entities/{$id}");

        return $this->toResource($response);
    }

    /**
     * @param Entity $entity
     *
     * @return Entity
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function create(Entity $entity): Entity
    {
        $response = $this->client->post('entities', $entity->toArray());

        return $this->toResource($response);
    }

    /**
     * @param Entity $entity
     *
     * @return Entity
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function update(Entity $entity): Entity
    {
        $response = $this->client->patch("entities/{$entity->getId()}", $entity->toArray());

        return $this->toResource($response);
    }
}
