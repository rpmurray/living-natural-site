<?php
/**
 * User: rmurray
 * Date: 9/26/17
 * Time: 2:30 PM
 */

/**
 *
 */
class UidGenerator {
    public function run() {
        $uid = uniqid();

        echo "Generated UID: " . $uid . "\n";
    }
}

(new UidGenerator())->run();
