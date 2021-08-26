<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

use JustCoded\FundAmerica\Objects\EntityDocumentFile;

/**
 * Class EntityDocument
 *
 * @package App\Modules\JustCoded\FundAmerica\app\Sdk\Resources
 */
class EntityDocument extends Resource
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var EntityDocumentFile[]
     */
    public $files = [];

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $entity_id;

    /**
     * @var string
     */
    public $purpose = 'kyc';

    /**
     * @var string
     */
    public $content_type;

    /**
     * @var int
     */
    public $size;

    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }
}
