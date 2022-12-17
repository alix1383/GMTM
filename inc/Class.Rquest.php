<?php

class Request
{
    private $Client, $Apikey;
    /**
     * __construct
     *
     * @param string $Apikey
     */
    public function __construct(string $Apikey)
    {
        $Client = new GuzzleHttp\Client();
        $this->Client = $Client;
        $this->Apikey = $Apikey;
    }

    /**
     * Get Token List
     *
     * @return array Token List
     */
    public function getTokenList(): array
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

    /**
     * Validate Api
     *
     * @return boolean
     */
    public function is_validaApiKey(): bool
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
    /**
     * Generate New TOken
     *
     * @param string $Memo
     * @return object login_token & steamid
     */
    public function genToken(string $Memo): object
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

    /**
     * Regenerate Token
     *
     * @param integer $Steamid
     * @return string New Token
     */
    public function resetToken(int $Steamid): string
    {
        $res = $this->Client;
        $result = $res->request(
            'POST',
            "https://api.steampowered.com/IGameServersService/resetLoginToken/v1/",
            [
                'query' => ['key' => $this->Apikey, 'steamid' => $Steamid],
            ]
        );
        return json_decode($result->getBody()->getContents())->response->login_token;
    }

    /**
     * Undocumented function
     *
     * @param integer $Steamid
     * @return void
     */
    public function deleteToken(int $Steamid): void
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
    /**
     * resetLoginToken function
     *
     * @param integer $Steamid
     * @return string New Token
     */
    public function resetLoginToken(int $Steamid): string
    {
        $res = $this->Client;
        $result = $res->request(
            'POST',
            "https://api.steampowered.com/IGameServersService/resetLoginToken/v1/",
            [
                'query' => ['key' => $this->Apikey, 'steamid' => $Steamid],
            ]
        );
        return json_decode($result->getBody())->response->login_token;
    }
}
