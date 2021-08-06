<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use FundAmerica\Resources\Investor;
use FundAmerica\Resources\Resource;

class InvestorService extends Service
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
