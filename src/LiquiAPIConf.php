<?php

namespace liqui\api;

/**
 * Liqui API Configuration constants.
 *
 * @category Liqui API
 * @author Dmytro Zarezenko <dmytro.zarezenko@gmail.com>
 * @copyright (c) 2017, Dmytro Zarezenko
 *
 * @git https://github.com/dzarezenko/liqui-api
 * @license http://opensource.org/licenses/MIT
 */
class LiquiAPIConf {

    const URL_PUBLIC  = "https://api.liqui.io/api";
    const URL_TRADING  = "https://api.liqui.io/tapi";

    const API_TYPE_PUBLIC = 'public';
    const API_TYPE_TRADING = 'trading';

    /**
     * Returns Liqui API URL.
     *
     * @param type $apiType
     * @param type $apiVersion
     *
     * @return string Liqui API URL
     */
    public static function getAPIUrl($apiType = self::API_TYPE_PUBLIC, $apiVersion = 3) {
        switch ($apiType) {
            case (self::API_TYPE_PUBLIC):
                return (self::URL_PUBLIC . "/{$apiVersion}/");
            case (self::API_TYPE_TRADING):
                return self::URL_TRADING;
        }
    }

}
