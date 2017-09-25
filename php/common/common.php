<?php
/**
 * User: rmurray
 * Date: 9/24/2017
 * Time: 10:58 AM
 */
define('ROOT_DIR', '/var/www/livingnatural');
define('PHP_DIR', ROOT_DIR . '/php');
define('CONF_DIR', PHP_DIR . '/conf');

// Smarty
define('SMARTY_DIR', PHP_DIR . '/lib/smarty');
define('SMARTY_CONF_DIR', CONF_DIR . '/smarty');
define('SMARTY_CONFIGS_DIR', SMARTY_CONF_DIR . '/configs');
define('SMARTY_CACHE_DIR', SMARTY_CONF_DIR . '/cache');
define('SMARTY_COMPILE_DIR', SMARTY_CONF_DIR . '/templates_c');
