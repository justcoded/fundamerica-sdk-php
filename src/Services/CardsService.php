<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Services;

use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use GuzzleHttp\Exception\GuzzleException;
use JustCoded\FundAmerica\Resources\Card;
use ReflectionException;

class CardsService extends Service
{
    /**
     * @param $response
     *
     * @return Card
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    protected function toResource($response): Card
    {
        return new Card($response);
    }

    /**
     * @param Card $card
     *
     * @return Card
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public function create(Card $card): Card
    {
        $response = $this->client->post('tokenized_credit_cards', $card->toArray());

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return Card
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function get(string $id): Card
    {
        $response = $this->client->get("tokenized_credit_cards/{$id}");

        return $this->toResource($response);
    }

    /**
     * @param string $id
     *
     * @return Card
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function cancel(string $id): Card
    {
        $response = $this->client->delete("tokenized_credit_cards/{$id}");

        return $this->toResource($response);
    }
}
