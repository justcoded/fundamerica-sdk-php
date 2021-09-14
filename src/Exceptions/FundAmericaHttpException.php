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
        $responseContents = $response->getBody()->getContents();
        $responseMessage = json_decode($responseContents);

        if (is_null($responseMessage)) {
            $errorMessage = $responseContents;
            goto THROW_NEXT;
        }

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

        $errorMessage = rtrim(implode(";\n", $messages), ";\n");

        THROW_NEXT:
        parent::__construct($errorMessage, $response->getStatusCode(), $previous);
    }
}
