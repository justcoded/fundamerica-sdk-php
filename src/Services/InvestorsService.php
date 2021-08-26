<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use JustCoded\FundAmerica\Resources\Investor;
use JustCoded\FundAmerica\Resources\Resource;

class InvestorsService extends Service
{
    protected function toResource($response): Resource
    {
        return new Investor($response);
    }

    public function all()
    {

    }

    public function get()
    {

    }

    public function create(string $entityId)
    {
        $response = $this->client->post('investors', [
            'primary_entity_id' => $entityId,
        ]);

        return $this->toResource($response);
    }

    public function update()
    {

    }
}
