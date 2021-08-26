<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class InvestorPayment extends Resource
{
    public $id;
    public $bank_transfer_method_id;
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
    public $distribution_id;
    public $investor_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
