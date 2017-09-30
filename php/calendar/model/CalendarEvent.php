<?php
/**
 * User: rmurray
 * Date: 9/26/2017
 * Time: 10:22 AM
 */

namespace calendar\model;

use common\Dates;
use common\types\Timestamp;
use common\types\Uid;

/**
 *
 */
class CalendarEvent {
    /** @var Uid */
    private $uid;
    /** @var Uid */
    private $calendarUid;
    /** @var string */
    private $title;
    /** @var string */
    private $description;
    /** @var Timestamp */
    private $date;
    /** @var int */
    private $duration;
    /** @var Timestamp */
    private $created;
    /** @var Timestamp */
    private $updated;

    /**
     * @param Uid       $uid
     * @param Uid       $calendarUid
     * @param string    $title
     * @param string    $description
     * @param Timestamp $date
     * @param int       $duration
     * @param Timestamp $created
     * @param Timestamp $updated
     */
    public function __construct(Uid $uid, Uid $calendarUid, $title, $description,
                                Timestamp $date, $duration, Timestamp $created, Timestamp $updated) {
        // populate
        $this->uid = $uid;
        $this->calendarUid = $calendarUid;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->duration = $duration;
        $this->created = $created;
        $this->updated = $updated;

        // init
        $this->init();
    }

    /**
     *
     */
    private function init() {
        $this->uid = empty($this->uid) ? Uid::generate() : $this->uid;
        $this->created = empty($this->created) ? dates::now() : $this->created;
        $this->updated = empty($this->updated) ? dates::now() : $this->updated;
    }

    /**
     * @return Uid
     */
    public function getUid() {
        return $this->uid;
    }

    /**
     * @return Uid
     */
    public function getCalendarUid() {
        return $this->calendarUid;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
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
    public function getDate() {
        return $this->date;
    }

    /**
     * @desc Duration of calendar event in minutes
     * @return int
     */
    public function getDuration() {
        return $this->duration;
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
