<?php


class Request
{
    private const REQUEST_URL = 'https://api.steampowered.com/IGameServersService/';
    
    private $client;
    private $apiKey;
    
    public function __construct(Client $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }
    
    public function getTokenList(): array
    {
        $response = $this->client->request('GET', self::REQUEST_URL . 'GetAccountList/v1/', [
            'query' => ['key' => $this->apiKey],
        ]);
        
        return json_decode($response->getBody(), true)['response']['servers'];
    }
    
    public function verifyApiKey(): bool
    {
        try {
            $this->client->request('GET', self::REQUEST_URL . 'GetAccountList/v1/', [
                'query' => ['key' => $this->apiKey],
            ]);
            
            return true;
        } catch (\Throwable) {
            return false;
        }
    }
    
    public function genToken(string $memo, int $appId): object
    {
        $response = $this->client->request('POST', self::REQUEST_URL . 'CreateAccount/v1/', [
            'query' => ['key' => $this->apiKey, 'appid' => $appId, 'memo' => $memo],
        ]);
        
        return json_decode($response->getBody())->response;
    }
    
    public function resetToken(int $steamId): string
    {
        return $this->resetLoginToken($steamId);
    }
    
    public function deleteToken(int $steamId): void
    {
        $this->client->request('POST', self::REQUEST_URL . 'DeleteAccount/v1/', [
            'query' => ['key' => $this->apiKey, 'steamid' => $steamId],
        ]);
    }
    
    public function resetLoginToken(int $steamId): string
    {
        $response = $this->client->request('POST', self::REQUEST_URL . 'resetLoginToken/v1/', [
            'query' => ['key' => $this->apiKey, 'steamid' => $steamId],
        ]);
        
        return json_decode($response->getBody())->response->login_token;
    }
}
