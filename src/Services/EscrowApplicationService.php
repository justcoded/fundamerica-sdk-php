<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use FundAmerica\Exceptions\FundAmericaHttpException;
use FundAmerica\Resources\ElectronicSignature;
use FundAmerica\Resources\EscrowApplication;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class EscrowApplicationService extends Service
{
    /**
     * @param $response
     *
     * @return EscrowApplication
     */
    protected function toResource($response): EscrowApplication
    {
        return new EscrowApplication($response);
    }

    /**
     * @param EscrowApplication $escrowApplication
     *
     * @return EscrowApplication
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function create(EscrowApplication $escrowApplication): EscrowApplication
    {
        $response = $this->client->post('escrow_service_applications', $escrowApplication->toArray());

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return EscrowApplication
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function get(string $id): EscrowApplication
    {
        $response = $this->client->get("escrow_service_applications/{$id}");

        return $this->toResource($response);
    }
}