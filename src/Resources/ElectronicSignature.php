<?php

declare(strict_types=1);

namespace FundAmerica\Resources;

/**
 * Class ElectronicSignature
 *
 * @package App\Modules\FundAmerica\Sdk\Objects
 */
class ElectronicSignature extends Resource
{
	public $id;
	public $url;
	public $anchor_id;
	public $company;
	public $document_url;
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
	public $data;

	/**
	 * @inheritDoc
	 */
	public function getId()
	{
		return $this->id;
	}
}
