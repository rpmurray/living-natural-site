<?php
/**
 * User: rmurray
 * Date: 9/26/2017
 * Time: 11:37 AM
 */

namespace calendar\dao;
use calendar\model\CalendarEvent;
use common\types\Timestamp;
use common\types\UID;

/**
 *
 */
class CalendarEventMapper {
    public static function map($result) {
        $calendarEvent = new CalendarEvent(
            new UID($result['uid']),
            new UID($result['calendarUid']),
            $result['title'],
            $result['description'],
            new Timestamp($result['date']),
            $result['duration'],
            new Timestamp($result['created']),
            new Timestamp($result['updated'])
        );

        return $calendarEvent;
    }

}
