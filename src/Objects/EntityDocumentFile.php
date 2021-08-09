<?php

declare(strict_types=1);

namespace FundAmerica\Objects;

/**
 * Class EntityFile
 *
 * @package App\Modules\FundAmerica\app\Sdk\Objects
 */
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
