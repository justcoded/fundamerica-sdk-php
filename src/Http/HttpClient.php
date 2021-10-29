<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Http;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use JustCoded\FundAmerica\Exceptions\FundAmericaHttpException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\TransferException;
use Psr\Http\Message\ResponseInterface;

class HttpClient
{
    protected string $baseUrl;
    protected string $apiKey;
    protected array $headers;
	protected static string $client = Client::class;

    /**
     * @param string $baseUrl
     * @param string $apiKey
     * @param array $defaultHeaders
     */
    public function __construct(string $baseUrl, string $apiKey, array $defaultHeaders = [])
    {
        $apiHeaders = [
            'Cache-Control' => 'no-cache',
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
        ];

        $this->headers = $defaultHeaders + $apiHeaders;
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $baseUrl
     * @param string $apiKey
     * @param array $defaultHeaders
     *
     * @return static
     */
    public static function make(string $baseUrl, string $apiKey, array $defaultHeaders = []): self
    {
        return new static($baseUrl, $apiKey, $defaultHeaders);
    }

    /**
     * @param string $header
     * @param string $value
     *
     * @return $this
     */
    public function addHeader(string $header, string $value): self
    {
        $this->headers[$header] = $value;

        return $this;
    }

    protected function http(array $config = [])
    {
        $config += [
            'base_uri' => $this->baseUrl,
            'auth'     => [$this->apiKey, ''],
            'headers'  => $this->headers,
        ];

        return new static::$client($config);
    }

	public static function setClient(string $class)
	{
		static::$client = $class;
	}

    /**
     * @param string $method
     * @param string $uri
     * @param array|null $params
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function request(string $method, string $uri, array $params = null)
    {
        try {
            return $this->http()->request($method, $uri, [
                'json' => $params,
            ]);
        } catch (ClientException $exception) {
            return $exception->getResponse();
        } catch (TransferException $exception) {
            return new Response(
                502,
                [],
                preg_replace('#\(see.*?\)#', '', $exception->getMessage()),
                '1.1',
                'Failed to connect to host'
            );
        }
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array|null $params
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function multipart(string $method, string $uri, array $params = null): ResponseInterface
    {
        return $this->http()->request($method, $uri, [
            'multipart' => $params,
        ]);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return object
     * @throws FundAmericaHttpException
     */
    public function decode(ResponseInterface $response): object
    {
        if ($response->getStatusCode() >= 400) {
            throw new FundAmericaHttpException($response);
        }

        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param string $uri
     * @param array|null $params
     *
     * @return object
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function get(string $uri, array $params = null)
    {
        $response = $this->request('GET', $uri, $params);

        return $this->decode($response);
    }

    /**
     * @param string $uri
     * @param array|null $params
     *
     * @return object
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function post(string $uri, array $params = null): object
    {
        $response = $this->request('POST', $uri, $params);

        return $this->decode($response);
    }

    /**
     * @param string $uri
     * @param array|null $params
     *
     * @return object
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function patch(string $uri, array $params = null): object
    {
        $response = $this->request('PATCH', $uri, $params);

        return $this->decode($response);
    }

    /**
     * @param string $uri
     *
     * @return object
     * @throws FundAmericaHttpException
     * @throws GuzzleException
     */
    public function delete(string $uri): object
    {
        $response = $this->request('DELETE', $uri);

        return $this->decode($response);
    }
}
