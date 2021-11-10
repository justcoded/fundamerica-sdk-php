<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class Disbursement extends Resource
{
    public const STATUS_PENDING = 'pending';
    public const STATUS_DISBURSED = 'disbursed';
    public const STATUS_VOIDED = 'voided';

    public $id;
    public $amount;
    public $bank_transfer_method_id;
    public $check_mailing_address;
    public $check_payee;
    public $reference;

    public $offering_id;
    public $city;
    public $email;
    public $name;
    public $phone;
    public $postal_code;
    public $region;
    public $street_address_1;
    public $status;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
