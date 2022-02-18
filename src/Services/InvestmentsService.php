<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use GuzzleHttp\Exception\GuzzleException;
use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use JustCoded\FundAmerica\Resources\Investment;
use ReflectionException;

class InvestmentsService extends Service
{
    /**
     * @param $response
     *
     * @return Investment
     * @throws ReflectionException
     */
    protected function toResource($response): Investment
    {
        return new Investment($response);
    }

    /**
     * @param Investment $investment
     *
     * @return Investment
     * @throws ReflectionException
     * @throws GuzzleException
     * @throws FundAmericaHttpException
     */
    public function create(Investment $investment): Investment
    {
        $response = $this->client->post('investments', $investment->toArray());

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return Investment
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function get(string $id): Investment
    {
        $response = $this->client->get("investments/{$id}");

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return Investment
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function invest(string $id): Investment
    {
        $response = $this->client->patch("investments/{$id}", [
            'status' => Investment::STATUS_INVESTED,
        ]);

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return Investment
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function cancel(string $id): Investment
    {
        $response = $this->client->delete("investments/{$id}");

        return $this->toResource($response);
    }
}
