<?php

declare(strict_types=1);

namespace FundAmerica\Resources;

use App\Modules\FundAmerica\Sdk\Core\ApiResponse;
use FundAmerica\Objects\WireDetails;
use ReflectionException;

/**
 * Class Offering
 *
 * @package App\Modules\FundAmerica\app\Sdk\Resources
 */
class Offering extends Resource
{
    public const ACCREDITATION_LEVEL_506c = '506c';
    public const ACCREDITATION_LEVEL_506b = '506b';
    public const ACCREDITATION_LEVEL_AT1 = 'reg_a_t1';
    public const ACCREDITATION_LEVEL_AT2 = 'reg_a_t2';
    public const ACCREDITATION_LEVEL_S = 'reg_s';
    public const ACCREDITATION_LEVEL_4A6 = '4a6';
    public const ACCREDITATION_LEVEL_US_STATE = 'us_state';
    public const ACCREDITATION_LEVEL_OTHER = 'other';

    public const FUND_TRANSFER_METHOD_ACH = 'ach';
    public const FUND_TRANSFER_METHOD_CHECK = 'check';
    public const FUND_TRANSFER_METHOD_CREDIT_CARD = 'credit_card';
    public const FUND_TRANSFER_METHOD_WIRE = 'wire';

    public const ESCROW_STATUS_NO_ESCROW = 'no_escrow';
    public const ESCROW_STATUS_PENDING = 'pending';
    public const ESCROW_STATUS_OPENED = 'opened';
    public const ESCROW_STATUS_CLOSED = 'closed';
    public const ESCROW_STATUS_CANCELLED = 'cancelled';

    public $id;
    public $url;

    /**
     * @var bool
     */
    public $accept_investments;

    /**
     * @var bool
     */
    public $accredited_investors;

    /**
     * @var float
     */
    public $ach_deposit_amount;

    /**
     * @var float
     */
    public $ach_deposit_max_percent;
    public $ach_deposit_release_at;

    /**
     * @var float
     */
    public $ach_limit;

    /**
     * @var float
     */
    public $amount;

    /**
     * @var bool
     */
    public $can_disburse;
    public $check_mailing_address;
    public $check_mailing_instructions;
    public $closed_at;
    public $created_at;

    /**
     * @var bool
     */
    public $delay_aml_until_funds_received;
    public $description;

    /**
     * @var bool
     */
    public $eb5;

    /**
     * @var string
     */
    public $entity_id;
    public $entity_url;
    public $escrow_closes_at;
    public $escrow_status;
    public $escrow_term_days;
    public $funds_disbursable;
    public $funds_in_escrow;
    public $funds_invested;
    public $funds_received;
    public $funds_refunded;
    public $funds_unavailable;
    public $investment_increment_amount;
    public $max_amount;
    public $max_investment_amount;
    public $min_amount;
    public $min_investment_amount;
    public $minimum_met;
    public $name;

    /**
     * @var bool
     */
    public $non_accredited_investors;

    /**
     * @var bool
     */
    public $non_us_investors;
    public $opened_at;
    public $payment_reference;
    public $regulatory_exemption;
    public $regulatory_exemption_details;
    public $security_url;
    public $type;
    public $updated_at;

    /**
     * @var bool
     */
    public $us_investors;

    /**
     * @var array
     */
    public $us_states_only;

    /**
     * @var bool
     */
    public $use_broker_dealer_service;

    /**
     * @var array|WireDetails
     */
    public $wire_details;

    /**
     * @var array
     */
    public $funds_transfer_methods;

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Offering constructor.
     *
     * @param ApiResponse|object|null $response
     *
     * @throws ReflectionException
     */
    public function __construct($response = null)
    {
        parent::__construct($response);

        if (! empty($this->wire_details)) {
            $this->wire_details = new WireDetails($this->wire_details);
        }
    }
}
