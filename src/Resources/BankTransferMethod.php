<?php

declare(strict_types=1);

namespace FundAmerica\Resources;

/**
 * Class BankTransferMethodResource
 *
 * @package App\Modules\FundAmerica\Sdk\Resources
 */
class BankTransferMethod extends Resource
{
    public const TYPE_ACH = 'ach';
    public const TYPE_WIRE = 'wire';

    public $id;
    public $account_number;
    public $name_on_account;
    public $routing_number;
    public $type;
    public $bank_name;

    public $account_number_short;
    public $country;
    public $intermediary_bank_name;
    public $intermediary_account_number;
    public $intermediary_routing_number;
    public $name;
    public $swift_code;

    public $created_at;
    public $updated_at;
    public $cancelled_at;
    public $verified;

    public $entity_url;
    public bool $use_for_investor_payments = false;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
