<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class CancelOfferingRequest extends Resource
{
    public const STATUS_PENDING = 'pending';
    public const STATUS_CONFIRMED = 'confirmed';
    public const STATUS_RESCINDED = 'rescinded';

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
