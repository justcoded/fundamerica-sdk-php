<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Objects;

class EntityDocumentFile extends BaseObject
{
    /**
     * @var string
     */
    public $content_type;

    /**
     * @var resource
     */
    public $stream;
}
