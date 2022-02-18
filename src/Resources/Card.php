<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class Card extends Resource
{
    public const CREDIT_CARD_TYPE_VISA = 'VI';
    public const CREDIT_CARD_TYPE_MASTER_CARD = 'MC';

    public $id;
    public $url;
    public $billing_postal_code;
    public $billing_name;

    public $created_at;
    public $cancelled_at;
    public $credit_card_exp_month;
    public $credit_card_exp_year;
    public $credit_card_type;
    public $investor_url;

    public $investor_id;
    public $credit_card_cvv;
    public $last_4;

    protected $toDates = [
        'created_at',
        'cancelled_at',
    ];

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }
}
