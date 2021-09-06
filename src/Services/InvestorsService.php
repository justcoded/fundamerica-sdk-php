<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use GuzzleHttp\Exception\GuzzleException;
use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use JustCoded\FundAmerica\Resources\Investor;

class InvestorsService extends Service
{
    /**
     * @param $response
     *
     * @return Investor
     */
    protected function toResource($response): Investor
    {
        return new Investor($response);
    }

    /**
     * @param string $id
     *
     * @return Investor
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function get(string $id): Investor
    {
        $response = $this->client->get("investors/{$id}");

        return $this->toResource($response);
    }

    /**
     * @param string $primaryEntityId
     * @param string|null $otherEntityIds
     * @param string|null $jointType
     *
     * @return Investor
     * @throws GuzzleException
     * @throws FundAmericaHttpException
     */
    public function create(string $primaryEntityId, string $otherEntityIds = null, string $jointType = null): Investor
    {
        $params = [
            'primary_entity_id' => $primaryEntityId,
        ];

        if ($otherEntityIds) {
            $params['other_entity_ids'] = $otherEntityIds;
        }

        $response = $this->client->post('investors', $params);

        return $this->toResource($response);
    }

    public function update()
    {

    }
}
