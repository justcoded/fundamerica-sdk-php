<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use JustCoded\FundAmerica\Resources\EscrowAgreement;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class EscrowAgreementsService extends Service
{
    /**
     * @param $response
     *
     * @return EscrowAgreement
     * @throws ReflectionException
     */
    protected function toResource($response): EscrowAgreement
    {
        return new EscrowAgreement($response);
    }

    /**
     * @param string $offeringId
     *
     * @return EscrowAgreement
     * @throws ReflectionException
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function create(string $offeringId): EscrowAgreement
    {
        $response = $this->client->post('escrow_agreements', [
            'offering_id' => $offeringId,
        ]);

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return EscrowAgreement
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function get(string $id): EscrowAgreement
    {
        $response = $this->client->get("escrow_agreements/{$id}");

        return $this->toResource($response);
    }
}
