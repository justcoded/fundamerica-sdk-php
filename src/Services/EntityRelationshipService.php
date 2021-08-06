<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use Exception;
use Illuminate\Http\Client\Response;
use FundAmerica\Resources\Entity;
use FundAmerica\Resources\EntityRelationship;

class EntityRelationshipService extends Service
{
    /**
     * @param $response
     *
     * @return EntityRelationship
     */
    protected function toResource($response): EntityRelationship
    {
        return new EntityRelationship($response);
    }

    /**
     * @param Entity $child
     * @param Entity $parent
     * @param string|null $reason
     *
     * @return EntityRelationship
     * @throws Exception
     */
    public function create(Entity $child, Entity $parent, string $reason = null): EntityRelationship
    {
        $response = $this->client->post("entity_relationships", [
            'child_entity_id'  => $child->id,
            'parent_entity_id' => $parent->id,
            'parent_title'     => $parent->name,
            'description'      => $reason,
        ]);

        return $this->toResource($response);
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
