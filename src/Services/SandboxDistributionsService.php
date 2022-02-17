<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use JustCoded\FundAmerica\Resources\Distribution;

class SandboxDistributionsService extends Service
{
    protected function toResource($response): Distribution
    {
        return new Distribution($response);
    }

    public function updateStatus(string $id, string $status): Distribution
    {
        $response = $this->client->patch("test_mode/distributions/{$id}", ['status' => $status]);

        return $this->toResource($response);
    }
}
