<?php

declare(strict_types=1);

namespace CFX\JsonClient;

use GuzzleHttp\Client as GuzzleHttpClient;

class Client
{
    public const DEFAULT_URL = 'https://www.cyrrus-fx.cz/json/get-last-rates/';
    protected GuzzleHttpClient $client;
    protected string $ratesUrl;

    /**
     * Client constructor.
     * @param string $ratesUrl
     */
    public function __construct(
        string $ratesUrl = Client::DEFAULT_URL
    ) {
        $this->client = new GuzzleHttpClient();
        $this->ratesUrl = $ratesUrl;
    }

    /**
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public function getRates(): ?array
    {
        $response = $this->client->get($this->ratesUrl);
        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        }
        return null;
    }
}