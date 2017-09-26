<?php
/**
 * User: rmurray
 * Date: 9/25/2017
 * Time: 4:41 PM
 */
namespace calendar\dao;

use calendar\model\CalendarEvent;
use common\Dao;
use common\types\UID;

/**
 *
 */
class CalendarEventsDao extends Dao {
    /**
     * @throws \Exception
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @param UID $uid
     *
     * @return \PDOStatement
     */
    public function fetchByUid(UID $uid) {
        $bv = array(':uid' => $uid->get());
        $sql = "select * from calendar_events where uid = :uid";
        $sth = $this->execute($sql, $bv);

        return $sth;
    }

    /**
     * @param UID $calendarUid
     *
     * @return \PDOStatement
     */
    public function fetchByCalendarUid(UID $calendarUid) {
        $bv = array(':calendar_uid' => $calendarUid->get());
        $sql = "select * from calendar_events where calendar_uid = :calendar_uid";
        $sth = $this->execute($sql, $bv);

        return $sth;
    }

    /**
     * @param CalendarEvent $calendarEvent
     *
     * @return int
     */
    public function insert(CalendarEvent &$calendarEvent) {
        $bv = array(
            ':uid'          => $calendarEvent->getUid()->get(),
            ':calendar_uid' => $calendarEvent->getCalendarUid()->get(),
            ':title'        => $calendarEvent->getTitle(),
            ':description'  => $calendarEvent->getDescription(),
            ':date'         => $calendarEvent->getDate()->get(),
            ':duration'     => $calendarEvent->getDuration(),
            ':created'      => $calendarEvent->getCreated()->get(),
            ':updated'      => $calendarEvent->getUpdated()->get(),
        );
        $sql = "insert into calendar_events (" .
               "uid, calendar_uid, title, description, " .
               "date, duration, created, updated" .
               ") values (" .
               ":uid, :calendar_uid, :title, :description, " .
               ":date, :duration, :created, :updated" .
               ");";
        $sth = $this->execute($sql, $bv);

        return $sth->rowCount();
    }
}
