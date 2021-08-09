<?php

declare(strict_types=1);

namespace FundAmerica\Objects;

/**
 * Class SigningLink
 *
 * @package App\Modules\FundAmerica\app\Sdk\Objects
 */
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
