<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Http;

use Psr\Http\Message\ResponseInterface;

interface HttpClientInterface
{
    public function __construct(string $baseUrl, string $apiKey, array $defaultHeaders = []);

    public static function make(string $baseUrl, string $apiKey, array $defaultHeaders = []): self;

    public function addHeader(string $header, string $value): self;

    public function request(string $method, string $uri, array $params = null): ResponseInterface;

    public function multipart(string $method, string $uri, array $params = null): ResponseInterface;

    public function decode(ResponseInterface $response): object;

    public function get(string $uri, array $params = null);

    public function post(string $uri, array $params = null): object;

    public function patch(string $uri, array $params = null): object;

    public function delete(string $uri): object;
}
