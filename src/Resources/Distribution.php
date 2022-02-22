<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class Distribution extends Resource
{
    public const PAYMENT_METHOD_ACH = 'ach';
    public const PAYMENT_METHOD_CHECK = 'check';
    public const PAYMENT_METHOD_WIRE = 'wire';

    public const STATUS_DRAFT = 'draft';
    public const STATUS_NOT_RECEIVED = 'not_received';
    public const STATUS_RECEIVED = 'received';
    public const STATUS_VOIDED = 'voided';
    public const STATUS_DISTRIBUTED = 'distributed';

    public $id;
    public $authorized_name;
    public $authorized_title;
    public $amount;
    public $principal_amount;
    public $dividend_amount;
    public $interest_amount;
    public $payment_method;
    public $security_id;
    public $ach_authorization_id;
    public $ready;
    public $status;
    public $contact_email;
    public $contact_name;
    public $contact_phone;
    public $company_name;
    public string $offering_url;

    public function getId()
    {
        return $this->id;
    }

    public function isDistributed(): bool
    {
        return $this->status == static::STATUS_DISTRIBUTED;
    }
}
