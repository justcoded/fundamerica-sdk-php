<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use JustCoded\FundAmerica\Resources\InvestorPayment;

class InvestorPaymentsService extends Service
{
    protected function toResource($response): InvestorPayment
    {
        return new InvestorPayment($response);
    }

    public function getByDistributionId(string $distributionId): array
    {
        $response = $this->client->get("distributions/{$distributionId}/investor_payments");

        return $this->collect($response);
    }
}
