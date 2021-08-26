<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class ElectronicSignature extends Resource
{
    public const ANCHOR_ID_ISSUER_SIGNATURE = 'issuer_signature';
    public const ANCHOR_ID_TRUSTEE_SIGNATURE = 'trustee_signature';
    public const ANCHOR_ID_TECHNOLOGIES_SIGNATURE = 'technologies_signature';

    public $id;
    public $url;
    public $anchor_id;
    public $company;
    public $document_url;
    public $ip_address;
    public $user_agent;
    public $email;
    public $literal;
    public $name;
    public $signable;
    public $signed;
    public $signed_at;
    public $title;

    /**
     * @var array
     */
    public $metadata;

    /**
     * @var array
     */
    public $data;

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }
}
