<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

use JustCoded\FundAmerica\Objects\WireDetails;
use ReflectionException;

class Investment extends Resource
{
    public const PAYMENT_METHOD_WIRE = 'wire';
    public const PAYMENT_METHOD_ACH = 'ach';

    public const STATUS_NOT_RECEIVED = 'not_received';
    public const STATUS_RECEIVED = 'received';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_VOIDED = 'voided';
    public const STATUS_REFUNDED = 'refunded';
    public const STATUS_INVESTED = 'invested';

    public $id;
    public $url;
    public $offering_id;
    public $offering_url;
    public $administration_fee;
    public $aml_check_investor;
    public $aml_exception;
    public $amount;
    public $amount_in_escrow;
    public $amount_received;
    public $amount_refunded;
    public $background_check_url;
    public $bank_reference;
    public $brokerage_fee;
    public $ceremonial_certificate_url;
    public $check_mailing_address;
    public $check_mailing_instructions;
    public $cleared;
    public $commission_fee;
    public $concession_fee;
    public $confirm_accreditation;
    public $created_at;
    public $debt_face_value;
    public $debt_par_value;
    public $disbursed_at;
    public $entity_id;
    public $entity_url;
    public $equity_share_count;
    public $equity_share_price;
    public $face_value;
    public $financial_adviser_name;
    public $funds_disbursable;
    public $funds_transfer_method;
    public $in_escrow_at;
    public $investor_url;
    public $par_value;
    public $payment_method;
    public $payment_reference;

    /**
     * @var WireDetails
     */
    public $wire_details;
    public $promo_code;
    public $referrer;
    public $refunded_at;
    public $review_trade;
    public $status;
    public $subscription_agreement_url;
    public $trade_review_status;
    public $trade_review_url;
    public $unit_count;
    public $updated_at;

    /**
     * Investment constructor.
     *
     * @param null $response
     *
     * @throws ReflectionException
     */
    public function __construct($response = null)
    {
        parent::__construct($response);

        if ($this->wire_details) {
            $wireDetails = [];
            foreach ($this->wire_details as $key => $value) {
                $wireDetails[$key] = $value;
            }

            $this->wire_details = new WireDetails($wireDetails);
        }
    }


    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }
}
