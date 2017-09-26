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
        $smarty = new SmartyUtil('calendar');
        $smarty->render('calendar.tpl');
    }
}
