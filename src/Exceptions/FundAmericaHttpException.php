<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class FundAmericaHttpException extends Exception
{
    /**
     * @param ResponseInterface $response
     * @param Throwable|null $previous
     */
    public function __construct(ResponseInterface $response, Throwable $previous = null)
    {
        $responseMessage = json_decode($response->getBody()->getContents());

        $messages = [];
        foreach ($responseMessage as $error) {
            if (is_object($error)) {
                foreach ($error as $field => $errors) {
                    $messages[] = $field . ': ' . implode(', ', $errors);
                }
            } else {
                $messages[] = $error;
            }
        }

        parent::__construct(rtrim(implode(";\n", $messages), ";\n"), $response->getStatusCode(), $previous);
    }
}
