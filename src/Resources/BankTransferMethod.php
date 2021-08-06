<?php

declare(strict_types=1);

namespace FundAmerica\Resources;

/**
 * Class BankTransferMethodResource
 *
 * @package App\Modules\FundAmerica\Sdk\Resources
 */
class BankTransferMethod extends Resource
{
	public const TYPE_ACH = 'ach';
	public const TYPE_WIRE = 'wire';

	public $id;
	public $account_number;
	public $name_on_account;
	public $routing_number;
	public $type;
	public $use_for_investor_payments;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}
}
