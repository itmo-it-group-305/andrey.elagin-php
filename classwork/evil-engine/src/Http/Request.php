<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 10.02.16
 * Time: 21:00
 */
namespace Daddyingrave\EvilEngine\Http;

class Request
{
    protected $cookieVars;
    protected $envVars;
    protected $filesVars;
    protected $getVars;
    protected $postVars;
    protected $requestParams;
    protected $serverVars;


    public function __construct(array $params = [])
    {
        $this->cookieVars = new ParamsContainer($_COOKIE);
        $this->envVars = new ParamsContainer($_ENV);
        $this->filesVars = new ParamsContainer($_FILES);
        $this->getVars = new ParamsContainer($_GET);
        $this->postVars = new ParamsContainer($_POST);
        $this->requestParams = new ParamsContainer($params);
        $this->serverVars = new ParamsContainer($_SERVER);
    }

    /**
     * @return ParamsContainer
     */
    public function cookie()
    {
        return $this->cookieVars;
    }

    /**
     * @return ParamsContainer
     */
    public function env()
    {
        return $this->envVars;
    }

    /**
     * @return ParamsContainer
     */
    public function files()
    {
        return $this->filesVars;
    }

    /**
     * @return ParamsContainer
     */
    public function get()
    {
        return $this->getVars;
    }

    /**
     * @return ParamsContainer
     */
    public function post()
    {
        return $this->postVars;
    }

    /**
     * @return ParamsContainer
     */
    public function params()
    {
        return $this->requestParams;
    }

    /**
     * @return ParamsContainer
     */
    public function server()
    {
        return $this->serverVars;
    }


}