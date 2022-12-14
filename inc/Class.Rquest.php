<?php

class Request
{
    private $Client, $Apikey;

    public function __construct(string $Apikey)
    {
        $Client = new GuzzleHttp\Client();
        $this->Client = $Client;
        $this->Apikey = $Apikey;
    }

    public function GetTokenList(): array
    {
        $res = $this->Client;
        $result = $res->request(
            'GET',
            "https://api.steampowered.com/IGameServersService/GetAccountList/v1/",
            [
                'query' => ['key' => $this->Apikey],
            ]
        );

        return json_decode($result->getBody(), true)['response']['servers'];
    }

    public function Is_ValidaApiKey(): bool
    {
        try {
            $res = $this->Client;
            $res->request(
                'GET',
                "https://api.steampowered.com/IGameServersService/GetAccountList/v1/",
                [
                    'query' => ['key' => $this->Apikey],
                ]
            );
            return true;
        } catch (\Throwable) {
            return false;
        }
    }

    public function GenToken(string $Memo): object
    {
        $res = $this->Client;
        $result = $res->request(
            'POST',
            "https://api.steampowered.com/IGameServersService/CreateAccount/v1/",
            [
                'query' => ['key' => $this->Apikey, 'appid' => 730, 'memo' => $Memo],
            ]
        );
        return json_decode($result->getBody())->response;
    }

    public function ResetToken(int $Steamid):string
    {
        $res = $this->Client;
        $result = $res->request(
            'POST',
            "https://api.steampowered.com/IGameServersService/ResetLoginToken/v1/",
            [
                'query' => ['key' => $this->Apikey, 'steamid' => $Steamid],
            ]
        );
        return json_decode($result->getBody()->getContents())->response->login_token;
    }

    public function DeleteToken(int $Steamid): void
    {
        $res = $this->Client;
        $res->request(
            'POST',
            "https://api.steampowered.com/IGameServersService/DeleteAccount/v1/",
            [
                'query' => ['key' => $this->Apikey, 'steamid' => $Steamid],
            ]
        );
    }

    public function ResetLoginToken(int $Steamid): string
    {
        $res = $this->Client;
        $result = $res->request(
            'POST',
            "https://api.steampowered.com/IGameServersService/ResetLoginToken/v1/",
            [
                'query' => ['key' => $this->Apikey, 'steamid' => $Steamid],
            ]
        );
        return json_decode($result->getBody())->response->login_token;
    }
}
