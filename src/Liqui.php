<?php

namespace liqui\api;

/**
 * Liqui API Wrapper.
 *
 * @category Liqui API
 * @author Dmytro Zarezenko <dmytro.zarezenko@gmail.com>
 * @copyright (c) 2017, Dmytro Zarezenko
 *
 * @git https://github.com/dzarezenko/liqui-api
 * @license http://opensource.org/licenses/MIT
 */
class Liqui extends LiquiAPITrading {
    /**
     * API version number.
     *
     * @var int
     */
    protected $apiVersion = 3;

    /**
     * Liqui public API object.
     *
     * @var LiquiAPIPublic
     */
    private $publicAPI = null;

    /**
     * Initiates Liqui API functionality. If API keys are not provided
     * then only public API methods will be available.
     *
     * @param string $apiKey Liqui API key
     * @param string $apiSecret Liqui API secret
     * @param int $apiVersion API version number.
     *
     * @return
     */
    public function __construct($apiKey = null, $apiSecret = null, $apiVersion = 3) {
        if (is_null($apiKey) || is_null($apiSecret)) {
            return;
        }

        $this->apiVersion = $apiVersion;
        $this->publicAPI = new LiquiAPIPublic($this->apiVersion);

        return parent::__construct($apiKey, $apiSecret);
    }

    public function __call($method, $args) {
        return call_user_func_array([$this->publicAPI, $method], $args);
    }

}
