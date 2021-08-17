<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use FundAmerica\Exceptions\FundAmericaHttpException;
use FundAmerica\Resources\BankTransferMethod;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class BankTransferMethodService extends Service
{
    /**
     * @param $response
     *
     * @return BankTransferMethod
     */
    protected function toResource($response): BankTransferMethod
    {
        return new BankTransferMethod($response);
    }

    /**
     * @param string $id
     *
     * @return BankTransferMethod
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function get(string $id): BankTransferMethod
    {
        return $this->toResource($this->client->get("bank_transfer_methods/{$id}"));
    }

    /**
     * @param BankTransferMethod $bankTransferMethod
     *
     * @return BankTransferMethod
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function create(BankTransferMethod $bankTransferMethod): BankTransferMethod
    {
        $response = $this->client->post('bank_transfer_methods', $bankTransferMethod->toArray());

        return $this->toResource($response);
    }
}
