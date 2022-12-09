<?php
class Input
{
    private $post, $get, $session, $server;

    public function __construct()
    {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->server = $_SERVER;
        $this->session = $_SESSION;

    }

    public function post($key = null, $default = null)
    {
        return $this->checkGlobal($this->post, $key, $default);
    }

    public function get($key = null, $default = null)
    {
        return $this->checkGlobal($this->get, $key, $default);
    }

    public function server($key = null, $default = null)
    {
        return $this->checkGlobal($this->server, $key, $default);
    }

    public function session($key = null, $default = null)
    {
        return $this->checkGlobal($this->session, $key, $default);
    }

    private function checkGlobal($global, $key = null, $default = null)
    {
        if ($key) {
            if (isset($global[$key])) {
                return $global[$key];
            } else {
                return $default ?: null;
            }
        }
        return $global;
    }
}
