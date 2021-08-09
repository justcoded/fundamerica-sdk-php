<?php

declare(strict_types=1);

namespace FundAmerica\Resources;

/**
 * Class Distribution
 *
 * @package App\Modules\FundAmerica\Sdk\Resources
 */
class Distribution extends Resource
{
    public const PAYMENT_METHOD_ACH = 'ach';
    public const PAYMENT_METHOD_CHECK = 'check';
    public const PAYMENT_METHOD_WIRE = 'wire';

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
    public $contact_email;
    public $contact_name;
    public $contact_phone;
    public $company_name;

    public function getId()
    {
        return $this->id;
    }
}
