<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class AchAuthorization extends Resource
{
    public const ACCOUNT_TYPE_CHECKING = 'checking';
    public const ACCOUNT_TYPE_SAVINGS = 'savings';

    public const CHECK_TYPE_PERSONAL = 'personal';
    public const CHECK_TYPE_BUSINESS = 'business';

    public $id;
    public $entity_id;
    public $account_type;
    public $check_type;
    public $account_number;
    public $routing_number;
    public $name_on_account;

    public $email;
    public $ip_address;
    public $user_agent;
    public $literal;

    public $title;
    public $company;
    public $contact_name;

    public $address;
    public $city;
    public $state;
    public $zip_code;

    public $account_number_short;
    public $agreement_html;
    public $name;
    public $verified;

    public $bank_transfer_method_url;
    public bool $use_for_investor_payments = false;

    public $bank_transfer_method;

    public $updated_at;
    public $created_at;
    public $cancelled_at;

    protected $toDates = [
        'updated_at',
        'created_at',
        'cancelled_at',
    ];

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }
}
