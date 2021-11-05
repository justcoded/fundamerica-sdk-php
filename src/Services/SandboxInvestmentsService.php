<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use JustCoded\FundAmerica\Resources\Investment;
use ReflectionException;

class SandboxInvestmentsService extends Service
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
     * Mark Investment Paid
     *
     * @param string $id
     * @param string $status
     *
     * @return Investment
     * @throws ReflectionException
     */
    public function updateStatus(string $id, string $status): Investment
    {
        $response = $this->client->patch("test_mode/investments/{$id}", ['status' => $status]);

        return $this->toResource($response);
    }
}
