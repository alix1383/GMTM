<?php

use GuzzleHttp\Client;

class steamAPI
{
    private $requestUrl = 'https://api.steampowered.com/IGameServersService/';
    private $client;
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->client = new Client();
        $this->apiKey = $apiKey;
    }

    /**
     * Get Token List.
     *
     * @return array
     */
    public function getTokenList()
    {
        $response = $this->client->request('GET', $this->requestUrl . 'GetAccountList/v1/', [
            'query' => [
                'key' => $this->apiKey,
            ],
        ]);
        $data = json_decode($response->getBody()->getContents(), true);

        if (isset($data['response']['servers'])) {
            return $data['response']['servers'];
        } else {
            return null;
        }
    }

    /**
     * Verify Api Key.
     *
     * @return bool
     */
    public function verifyApiKey(): bool
    {
        try {
            $this->client->request('GET', $this->requestUrl . 'GetAccountList/v1/', [
                'query' => [
                    'key' => $this->apiKey,
                ],
            ]);

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    /**
     * Generate New Token.
     *
     * @param string $memo
     * @param int $appId
     *
     * @return object
     */
    public function generateToken(string $memo, int $appId): object
    {
        $response = $this->client->request('POST', $this->requestUrl . 'CreateAccount/v1/', [
            'query' => [
                'key' => $this->apiKey,
                'appid' => $appId,
                'memo' => $memo,
            ],
        ]);

        return json_decode($response->getBody()->getContents())->response;
    }

    /**
     * Delete Token.
     *
     * @param int $steamId
     *
     * @return void
     */
    public function deleteToken(int $steamId): void
    {
        $this->client->request('POST', $this->requestUrl . 'DeleteAccount/v1/', [
            'query' => [
                'key' => $this->apiKey,
                'steamid' => $steamId,
            ],
        ]);
    }

    /**
     * Reset Login Token.
     *
     * @param int $steamId
     *
     * @return string
     */
    public function resetLoginToken(int $steamId): string
    {
        $response = $this->client->request('POST', $this->requestUrl . 'resetLoginToken/v1/', [
            'query' => [
                'key' => $this->apiKey,
                'steamid' => $steamId,
            ],
        ]);

        return json_decode($response->getBody()->getContents())->response->login_token;
    }
}
