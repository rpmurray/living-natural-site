<?php
/**
 * User: rmurray
 * Date: 9/24/2017
 * Time: 11:49 AM
 */
namespace calendar;

require_once 'common.php';

/**
 *
 */
class Calendar {
    /**
     *
     */
    public function main() {
        $builder = new CalendarBuilder();
        $builder->build();
    }
}

(new Calendar())->main();
