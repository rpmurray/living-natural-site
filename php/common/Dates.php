<?php
/**
 * User: rmurray
 * Date: 9/26/2017
 * Time: 10:50 AM
 */

namespace common;

/**
 *
 */
class Dates {
    const FORMAT_DATETIME = "Y-m-d\TH:i:sP";
    const FORMAT_DATE = "Y-m-d";
    const FORMAT_TIME = "\TH:i:sP";

    /**
     * @return string
     */
    public static function now() {
        return date(Dates::FORMAT_DATETIME);
    }

    /**
     * @param string $datetime
     *
     * @return string
     */
    public static function date($datetime) {
        return date(Dates::FORMAT_DATE, $datetime);
    }

    /**
     * @param string $datetime
     *
     * @return string
     */
    public static function time($datetime) {
        return date(Dates::FORMAT_TIME, $datetime);
    }
}
