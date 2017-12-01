<?php

namespace liqui\api;

/**
 * Liqui Public API Methods.
 *
 * This api provides access to such information as tickers of currency pairs,
 * active orders on different pairs, the latest trades for each pair etc.
 *
 * @link URL https://liqui.io/api
 *
 * @category Liqui API
 * @author Dmytro Zarezenko <dmytro.zarezenko@gmail.com>
 * @copyright (c) 2017, Dmytro Zarezenko
 *
 * @git https://github.com/dzarezenko/liqui-api
 * @license http://opensource.org/licenses/MIT
 */
class LiquiAPIPublic {
    /**
     * API version number.
     *
     * @var int
     */
    private $apiVersion = 3;

    /**
     * Constructor of the class.
     *
     * @param int $apiVersion API version number.
     */
    public function __construct($apiVersion = 3) {
        $this->apiVersion = $apiVersion;
    }

    /**
     * This method provides all the information about currently active pairs,
     * such as the maximum number of digits after the decimal point, the minimum
     * price, the maximum price, the minimum transaction size, whether the pair
     * is hidden, the commission for each pair.
     *
     * @return array
     */
    public function getInfo() {
        return $this->_request('info');
    }

    /**
     * This method provides all the information about currently active pairs,
     * such as: the maximum price, the minimum price, average price, trade volume,
     * trade volume in currency, the last trade, Buy and Sell price.
     *
     * All information is provided over the past 24 hours.
     *
     * @param string $pair Currency trade pair or list of pairs
     *           (ex: 'eth_btc' or 'eth_btc-edg_btc').
     *
     * @return array
     */
    public function getTicker($pair) {
        return $this->_request("ticker/{$pair}");
    }

    /**
     * This method provides the information about active orders on the pair.
     *
     * @param string $pair Currency trade pair or list of pairs
     *           (ex: 'eth_btc' or 'eth_btc-edg_btc').
     * @param int $limit (optional)indicates how many orders should be displayed
     *           (150 by default). Is set to less than 2000.
     *
     * @return array
     */
    public function getDepth($pair, $limit = 150) {
        return $this->_request("depth/{$pair}?limit={$limit}");
    }

    /**
     * This method provides the information about the last trades.
     *
     * @param string $pair Currency trade pair or list of pairs
     *           (ex: 'eth_btc' or 'eth_btc-edg_btc').
     * @param int $limit (optional)indicates how many orders should be displayed
     *           (150 by default). Is set to less than 2000.
     *
     * @return array
     */
    public function getTrades($pair, $limit = 150) {
        return $this->_request("trades/{$pair}?limit={$limit}");
    }

    /**
     * JSON request functionality wrapper.
     *
     * @param string $request API request
     *
     * @return array JSON data.
     */
    private function _request($request) {
        return tools\Request::json($request, $this->apiVersion);
    }

}
