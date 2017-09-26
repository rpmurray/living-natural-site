<?php
/**
 * User: rmurray
 * Date: 9/26/2017
 * Time: 10:22 AM
 */

namespace calendar\model;

use common\Dates;
use common\types\Timestamp;

/**
 *
 */
class Calendar {
    /** @var string */
    private $uid;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var Timestamp */
    private $created;
    /** @var Timestamp */
    private $updated;

    function __construct($uid, $name, $description, $created, $updated) {
        $this->uid = $uid;
        $this->name = $name;
        $this->description = $description;
        $this->created = empty($created) ? Dates::now() : $created;
        $this->updated = empty($updated) ? Dates::now() : $updated;
    }

    /**
     * @return string
     */
    public function getUid() {
        return $this->uid;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return Timestamp
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @return Timestamp
     */
    public function getUpdated() {
        return $this->updated;
    }
}
