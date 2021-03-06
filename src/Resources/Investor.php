<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class Investor extends Resource
{
    public const TYPE_JOINT_IN_COMMON = 'jtic';
    public const TYPE_JOINT_WITH_RIGHT_OF_SURVIVORSHIP = 'jtwros';
    public const TYPE_IRA = 'ira';

    /**
     * @var string
     */
    public $id;

    /**
     * @var array
     */
    public $entity_urls;

    public $url;
    public $accreditation_type;
    public $accredited;
    public $annual_income;
    public $custodian_entity_url;
    public $exempt_from_withholding;
    public $name;
    public $net_worth;
    public $primary_entity_url;
    public $type;
    public $us_citizen_or_resident;
    public $vesting_name;

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }
}
