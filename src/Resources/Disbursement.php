<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class Disbursement extends Resource
{
    public $id;
    public $amount;
    public $bank_transfer_method_id;
    public $check_mailing_address;
    public $check_payee;
    public $reference;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
