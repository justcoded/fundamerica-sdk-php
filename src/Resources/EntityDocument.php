<?php

declare(strict_types=1);

namespace FundAmerica\Resources;

use App\Modules\FundAmerica\app\Sdk\Objects\EntityDocumentFile;

/**
 * Class EntityDocument
 *
 * @package App\Modules\FundAmerica\app\Sdk\Resources
 */
class EntityDocument extends Entity
{
	/**
	 * @var EntityDocumentFile[]
	 */
	public $files = [];

	/**
	 * @var string
	 */
	public $title;

	/**
	 * @var string
	 */
	public $description;

	/**
	 * @var string
	 */
	public $entity_id;

	/**
	 * @var string
	 */
	public $purpose = 'kyc';
}
