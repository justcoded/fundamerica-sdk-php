<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use FundAmerica\Exceptions\FundAmericaHttpException;
use FundAmerica\Resources\EscrowAgreement;
use FundAmerica\Resources\TechServicesAgreement;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class TechServicesAgreementService extends Service
{
    /**
     * @param $response
     *
     * @return TechServicesAgreement
     */
    protected function toResource($response): TechServicesAgreement
    {
        return new TechServicesAgreement($response);
    }

    /**
     * @param string $offeringId
     *
     * @return TechServicesAgreement
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function create(string $offeringId): TechServicesAgreement
    {
        $response = $this->client->post('tech_services_agreements', [
            'offering_id' => $offeringId,
        ]);

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return TechServicesAgreement
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function get(string $id): TechServicesAgreement
    {
        $response = $this->client->get("tech_services_agreements/{$id}");

        return $this->toResource($response);
    }
}
