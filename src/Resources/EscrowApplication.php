<?php

declare(strict_types=1);

namespace FundAmerica\Resources;

class EscrowApplication extends Resource
{
    public const STATUS_ACCEPTED = 'accepted';
    public const STATUS_PENDING = 'pending';
    public const STATUS_DENIED = 'denied';

    public $id;
    public $offering_id;
    public $escrow_agreement_id;
    public $ppm_url;
    public $ppm_username;
    public $ppm_password;
    public $status;
    public $denial_message;

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }
}
