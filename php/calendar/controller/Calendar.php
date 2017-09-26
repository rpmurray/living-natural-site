<?php
/**
 * User: rmurray
 * Date: 9/24/2017
 * Time: 11:49 AM
 */
namespace calendar\controller;

use calendar\view\CalendarBuilder;

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
