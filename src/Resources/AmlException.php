<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class AmlException extends Resource
{
    public const STATUS_PENDING = 'pending';
    public const STATUS_CONTACT_ISSUER = 'contact_issuer';
    public const STATUS_CLEARED = 'cleared';

    public string $id;
    public bool $ach_info_mismatch;
    public bool $address_verified;
    public bool $dob_verified;
    public bool $documentation_required;
    public bool $name_verified;
    public bool $tin_verified;
    public bool $watch_lists_cleared;
    public string $background_check_url;
    public string $entity_url;
    public string $investment_url;
    public string $status;
    public $status_updates;
    public $created_at;
    public $updated_at;

    /**
     * @var Entity
     */
    public $entity;

    /**
     * @var Investment
     */
    public $investment;

    protected $toDates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
