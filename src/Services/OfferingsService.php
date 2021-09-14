<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use JustCoded\FundAmerica\Resources\CancelOfferingRequest;
use JustCoded\FundAmerica\Resources\CloseOfferingRequest;
use JustCoded\FundAmerica\Resources\Offering;
use GuzzleHttp\Exception\GuzzleException;
use JustCoded\FundAmerica\Resources\Security;
use ReflectionException;

class OfferingsService extends Service
{
    /**
     * @param $response
     *
     * @return Offering
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    protected function toResource($response): Offering
    {
        $offering = new Offering($response);
        $offering->security = new Security($this->client->get($offering->security_url));

        return $offering;
    }

    /**
     * @param Offering $offering
     *
     * @return Offering
     * @throws ReflectionException
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function create(Offering $offering): Offering
    {
        $response = $this->client->post('offerings', $offering->toArray());

        return $this->toResource($response);
    }

    /**
     * @param Offering $offering
     *
     * @return Offering
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function update(Offering $offering): Offering
    {
        $response = $this->client->patch("offerings/{$offering->getId()}", $offering->toArray());

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return Offering
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function get(string $id): Offering
    {
        $response = $this->client->get("offerings/{$id}");

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return CloseOfferingRequest
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function close(string $id): CloseOfferingRequest
    {
        $response = $this->client->post('close_offering_requests', [
            'offering_id' => $id
        ]);

        return new CloseOfferingRequest($response);
    }

    /**
     * @param string $id
     *
     * @return CancelOfferingRequest
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function cancel(string $id): CancelOfferingRequest
    {
        $response = $this->client->post('cancel_offering_requests', [
            'offering_id' => $id
        ]);

        return new CancelOfferingRequest($response);
    }
}
