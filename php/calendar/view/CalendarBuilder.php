<?php
/**
 * User: rmurray
 * Date: 9/24/2017
 * Time: 12:25 PM
 */

namespace calendar\view;

use common\SmartyUtil;

/**
 *
 */
class CalendarBuilder {
    /**
     *
     */
    public function build() {
        // setup
        $smarty = new SmartyUtil('calendar');

        // do some stuff


        // render
        $smarty->render('calendar.tpl');
    }
}
