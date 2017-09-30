<?php
/**
 * User: rmurray
 * Date: 9/26/2017
 * Time: 12:17 PM
 */

namespace calendar\dao;
use common\types\Uid;
use calendar\model\CalendarEvent;

/**
 *
 */
class CalendarRepository {
    private $dao;

    public function __construct() {
        $this->dao = new CalendarEventsDao();
    }

    /**
     * @param Uid $uid
     *
     * @return CalendarEvent
     */
    public function byUid(Uid $uid) {
        $sth = $this->dao->fetchByUid($uid);
        $calendarEvent = CalendarEventMapper::map($sth->fetch(\PDO::FETCH_ASSOC));

        return $calendarEvent;
    }

    /**
     * @param Uid $calendarUid
     *
     * @return CalendarEvent[]
     */
    public function byCalendarUid(Uid $calendarUid) {
        $sth = $this->dao->fetchByCalendarUid($calendarUid);
        $count = $sth->rowCount();
        $calendarEvents = array();
        for($i = 0; $i < $count; $i++) {
            $calendarEvents[] = CalendarEventMapper::map($sth->fetch(\PDO::FETCH_ASSOC));
        }

        return $calendarEvents;
    }

    /**
     * @param CalendarEvent $calendarEvent
     *
     * @return int
     */
    public function store(CalendarEvent &$calendarEvent) {
        $count = $this->dao->insert($calendarEvent);

        return $count;
    }
}
