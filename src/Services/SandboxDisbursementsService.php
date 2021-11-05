<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use JustCoded\FundAmerica\Resources\Disbursement;

class SandboxDisbursementsService extends Service
{
    /**
     * @param $response
     *
     * @return Disbursement
     */
    protected function toResource($response): Disbursement
    {
        return new Disbursement($response);
    }

    /**
     * Update Status
     *
     * @param string $id
     * @param string $status
     *
     * @return Disbursement
     */
    public function updateStatus(string $id, string $status): Disbursement
    {
        $response = $this->client->patch("test_mode/disbursements/{$id}", ['status' => $status]);

        return $this->toResource($response);
    }
}
