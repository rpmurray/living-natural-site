<?php
/**
 * User: rmurray
 * Date: 9/26/2017
 * Time: 10:50 AM
 */

namespace AppBundle\Util;

/**
 *
 */
class Dates {
    const FORMAT_DATETIME = "Y-m-d\TH:i:sP";
    const FORMAT_DATE = "Y-m-d";
    const FORMAT_TIME = "\TH:i:sP";
    const FORMAT_DISPLAY = "M d, Y H:i:s A";
    const FORMAT_JS = "m-d-Y";

    /**
     * @return \DateTimeZone
     */
    public static function timeZone() {
        return new \DateTimeZone("UTC");
    }

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

    /**
     * @param string $dateStr
     *
     * @return \DateTime
     */
    public static function toDateTime($dateStr) {
        return new \DateTime($dateStr, Dates::timeZone());
    }

    /**
     * @param \DateTime $date
     *
     * @return string
     */
    public static function toString($date, $format=Dates::FORMAT_DATETIME) {
        return $date->format($format);
    }
}
