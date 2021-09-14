<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class CancelOfferingRequest extends Resource
{
    public $id;
    public $comment;
    public $status;
    public $created_at;
    public $updated_at;

    protected $toDates = [
        'created_at',
        'updated_at',
    ];

    public function getId()
    {
        return $this->id;
    }
}
