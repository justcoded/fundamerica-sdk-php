<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use FundAmerica\Exceptions\FundAmericaHttpException;
use FundAmerica\Resources\ElectronicSignature;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class ElectronicSignatureService extends Service
{
    /**
     * @param $response
     *
     * @return ElectronicSignature
     */
    protected function toResource($response): ElectronicSignature
    {
        return new ElectronicSignature($response);
    }

    /**
     * @param ElectronicSignature $electronicSignature
     *
     * @return ElectronicSignature
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function update(ElectronicSignature $electronicSignature)
    {
        $response = $this->client->patch("electronic_signatures/{$electronicSignature->getId()}", $electronicSignature->toArray());

        return $this->toResource($response);
    }
}
