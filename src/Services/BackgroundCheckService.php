<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use Exception;
use Illuminate\Http\Client\Response;
use FundAmerica\Resources\BackgroundCheck;
use FundAmerica\Resources\Entity;
use FundAmerica\Resources\Offering;

class BackgroundCheckService extends Service
{
    /**
     * @param Response $response
     *
     * @return BackgroundCheck
     */
    protected function toResource(Response $response): BackgroundCheck
    {
        return new BackgroundCheck($response);
    }

    /**
     * @param Entity $entity
     * @param Offering $offering
     *
     * @return BackgroundCheck
     * @throws Exception
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
