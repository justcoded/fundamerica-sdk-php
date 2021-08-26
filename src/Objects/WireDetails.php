<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Objects;

class WireDetails extends BaseObject
{
    /**
     * @var int
     */
    public $account_number;

    /**
     * @var string
     */
    public $bank_address;

    /**
     * @var string
     */
    public $bank_name;

    /**
     * @var string
     */
    public $bank_phone;

    /**
     * @var string
     */
    public $beneficiary_address;

    /**
     * @var string
     */
    public $beneficiary_name;

    /**
     * @var string
     */
    public $intermediary_bank_address;

    /**
     * @var string
     */
    public $intermediary_bank_name;

    /**
     * @var string
     */
    public $routing_number;

    /**
     * @var string
     */
    public $swift_code;
}
