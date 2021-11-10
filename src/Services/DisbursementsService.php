<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use GuzzleHttp\Exception\GuzzleException;
use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use JustCoded\FundAmerica\Resources\Disbursement;
use JustCoded\FundAmerica\Resources\Resource;
use ReflectionException;

class DisbursementsService extends Service
{
    /**
     * @param $response
     *
     * @return Disbursement
     */
    protected function toResource($response): Disbursement
    {
        return new Disbursement($response);
    }

    /**
     * @param Disbursement $disbursement
     *
     * @return Resource
     * @throws GuzzleException
     * @throws FundAmericaHttpException
     * @throws ReflectionException
     */
    public function create(Disbursement $disbursement): Disbursement
    {
        $response = $this->client->post('disbursements', $disbursement->toArray());

        return $this->toResource($response);
    }

    /**
     * @param Disbursement $disbursement
     *
     * @return Disbursement
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function update(Disbursement $disbursement): Disbursement
    {
        $response = $this->client->patch("disbursements/{$disbursement->getId()}", $disbursement->toArray());

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return Disbursement
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function get(string $id): Disbursement
    {
        $response = $this->client->get("disbursements/{$id}");

        return $this->toResource($response);
    }
}
