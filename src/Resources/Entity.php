<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

/**
 * Class EntityResource
 *
 * @package App\Modules\JustCoded\FundAmerica\app\Sdk\Resources
 */
class Entity extends Resource
{
    public const TYPE_PERSON = 'person';
    public const TYPE_COMPANY = 'company';
    public const TYPE_CUSTODIAL = 'custodial';
    public const TYPE_GB = 'great_britain';

    public const INVESTOR_SUITABILITY_STATUS_NULL = null;
    public const INVESTOR_SUITABILITY_STATUS_PENDING = 'pending';
    public const INVESTOR_SUITABILITY_STATUS_ACCEPTED = 'accepted';
    public const INVESTOR_SUITABILITY_STATUS_DENIED = 'denied';

    public $id;
    public $type;
    public $city;
    public $country;
    public $email;
    public $date_of_birth;
    public $contact_name;
    public $name;
    public $phone;
    public $postal_code;
    public $region;
    public $region_formed_in;
    public $street_address_1;
    public $street_address_2;
    public $tax_id_number;
    public $broker_dealer_customer;
    public $building_name;
    public $platform_investor_url;
    public $street_name;
    public $street_number;
    public $street_type;
    public $unit_number;
    public $executive_name;
    public $investor_suitability_status;
    public $kyc_status;
    public $url;
    public $created_at;
    public $updated_at;

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }
}
