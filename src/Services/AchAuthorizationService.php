<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use FundAmerica\Exceptions\FundAmericaHttpException;
use FundAmerica\Resources\AchAuthorization;
use FundAmerica\Resources\BankTransferMethod;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class AchAuthorizationService extends Service
{
    /**
     * @param $response
     *
     * @return AchAuthorization
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    protected function toResource($response): AchAuthorization
    {
        $resource = new AchAuthorization($response);
        $resource->bank_transfer_method = new BankTransferMethod($this->client->get($resource->bank_transfer_method_url));

        return $resource;
    }

    /**
     * @param AchAuthorization $achAuthorization
     *
     * @return AchAuthorization
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function create(AchAuthorization $achAuthorization): AchAuthorization
    {
        $response = $this->client->post('ach_authorizations', $achAuthorization->toArray());

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return AchAuthorization
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function get(string $id): AchAuthorization
    {
        $response = $this->client->get("ach_authorizations/{$id}");

        return $this->toResource($response);
    }

    /**
     * @return AchAuthorization
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function agreement(): AchAuthorization
    {
        $response = $this->client->get("ach_authorizations/agreement_html");

        return $this->toResource($response);
    }
}
