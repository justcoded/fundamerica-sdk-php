<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Objects;

class SignLink extends BaseObject
{
    public const TYPE_ISSUER_SIGNATURE = 'issuer_signature';
    public const TYPE_TRUSTEE_SIGNATURE = 'trustee_signature';

    public $type;
    public $electronic_signature_id;
    public $expires;
    public $url;
    public $anchor_id;
}
