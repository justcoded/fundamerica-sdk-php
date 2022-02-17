<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class InvestorPayment extends Resource
{
    public const STATUS_PENDING = 'pending'; // created, no transaction or transaction is pending
    public const STATUS_PROCESSING = 'processing'; // transaction exist and processing
    public const STATUS_PAID = 'paid'; // transaction is paid
    public const STATUS_VOIDED = 'voided'; // no transaction or transaction is cancelled

    public $id;
    public $amount;
    public $dividend_amount;
    public $interest_amount;
    public $ordinary_income_amount;
    public $other_amount;
    public $other_type;
    public $principal_amount;
    public $profit_share_amount;
    public $revenue_share_amount;
    public $royalty_amount;
    public $investor_id;
    public string $status;
    public string $bank_transfer_method_url;
    public string $entity_url;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
