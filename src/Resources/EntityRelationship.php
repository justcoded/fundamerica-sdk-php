<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class EntityRelationship extends Resource
{
    public $id;
    public $url;
    public $child_entity_url;
    public $created_at;
    public $description;
    public $parent_entity_url;
    public $parent_title;
    public $updated_at;

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }
}
