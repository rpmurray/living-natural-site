<?php
/**
 * User: rmurray
 * Date: 9/26/2017
 * Time: 12:00 PM
 */

namespace common\types;

/**
 *
 */
class Uid {
    /** @var string */
    private $value;

    function __construct($value) {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function get() {
        return $this->value;
    }

    /**
     * @return Uid
     */
    public static function generate() {
        return new Uid(uniqid());
    }
}
