<?php
/**
 * User: rmurray
 * Date: 9/26/2017
 * Time: 11:02 AM
 */

namespace common\types;
use common\Dates;

/**
 *
 */
class Timestamp {
    /** @var string */
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function get() {
        return date($this->value, DATE_ATOM);
    }

    /**
     * @return string
     */
    public function getDate() {
        return Dates::date($this->value);
    }

    /**
     * @return string
     */
    public function getTime() {
        return Dates::time($this->value);
    }
}
