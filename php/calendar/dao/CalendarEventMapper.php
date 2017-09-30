<?php
/**
 * User: rmurray
 * Date: 9/26/2017
 * Time: 11:37 AM
 */

namespace calendar\dao;
use calendar\model\CalendarEvent;
use common\types\Timestamp;
use common\types\Uid;

/**
 *
 */
class CalendarEventMapper {
    public static function map($result) {
        $calendarEvent = new CalendarEvent(
            new Uid($result['uid']),
            new Uid($result['calendarUid']),
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
