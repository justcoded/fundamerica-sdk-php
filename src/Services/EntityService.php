<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use Illuminate\Http\Client\Response;
use FundAmerica\Resources\Entity;
use FundAmerica\Resources\Entity as EntityResource;
use ReflectionException;

class EntityService extends Service
{
    /**
     * @param Response $response
     *
     * @return EntityResource
     */
    protected function toResource(Response $response): EntityResource
    {
        return new Entity($response->body());
    }

    public function all()
    {

    }

    public function get()
    {

    }

    /**
     * @param EntityResource $entity
     *
     * @return EntityResource
     * @throws ReflectionException
     */
    public function create(EntityResource $entity): Entity
    {
        $response = $this->client->post('entities', $entity->toArray());

        return $this->toResource($response);
    }

    /**
     * @param string $id
     * @param EntityResource $entity
     *
     * @return EntityResource
     * @throws ReflectionException
     */
    public function update(string $id, EntityResource $entity): Entity
    {
        $response = $this->client->patch("entities/{$id}", $entity->toArray());

        return $this->toResource($response);
    }
}
