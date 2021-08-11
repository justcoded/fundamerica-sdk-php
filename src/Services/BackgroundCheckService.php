<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use Exception;
use FundAmerica\Exceptions\FundAmericaHttpException;
use FundAmerica\Resources\BackgroundCheck;
use FundAmerica\Resources\Entity;
use FundAmerica\Resources\Offering;
use GuzzleHttp\Exception\GuzzleException;

class BackgroundCheckService extends Service
{
    /**
     * @param $response
     *
     * @return BackgroundCheck
     */
    protected function toResource($response): BackgroundCheck
    {
        return new BackgroundCheck($response);
    }

    /**
     * @param Entity $entity
     * @param Offering $offering
     *
     * @return BackgroundCheck
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function create(Entity $entity, Offering $offering)
    {
        $response = $this->client->post('background_checks', [
            'entity_id'   => $entity->id,
            'offering_id' => $offering->id,
        ]);

        return $this->toResource($response);
    }
}
