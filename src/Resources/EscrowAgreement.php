<?php

declare(strict_types=1);

namespace FundAmerica\Resources;

use FundAmerica\Objects\SignLink;
use ReflectionException;

/**
 * Class EscrowAgreement
 *
 * @package App\Modules\FundAmerica\app\Sdk\Resources
 */
class EscrowAgreement extends Resource
{
    public $id;
    public $url;
    public $archived_pdf_url;
    public $offering_url;
    public $body_html;
    public $signed;

    /**
     * @var SignLink[]
     */
    public $signing_links;

    /**
     * @var ElectronicSignature[]
     */
    public $electronic_signatures;

    /**
     * EscrowAgreement constructor.
     *
     * @param array|object|null $response
     *
     * @throws ReflectionException
     */
    public function __construct($response = null)
    {
        parent::__construct($response);

        $signingLinks = [];
        foreach ($this->signing_links as $type => $signingLink) {
            if (is_object($signingLink)) {
                $signingLinks[] = new SignLink((array) $signingLink);
                continue;
            }
            $data = ['type' => $type] + $signingLink;
            $signingLinks[] = new SignLink($data);
        }

        $this->signing_links = $signingLinks;

        if (! empty($this->electronic_signatures)) {
            $signs = [];
            foreach ($this->electronic_signatures as $electronicSignature) {
                $signs[] = new ElectronicSignature($electronicSignature);
            }

            $this->electronic_signatures = $signs;
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
