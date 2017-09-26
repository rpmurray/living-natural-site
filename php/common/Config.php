<?php
/**
 * User: rmurray
 * Date: 9/24/2017
 * Time: 10:58 AM
 */
namespace common;

class Config {
    // core
    const ROOT_DIR = '/var/www/livingnatural';
    const PHP_DIR = '/var/www/livingnatural/php';
    const CONF_DIR = '/var/www/livingnatural/php/conf';

    // smarty
    const SMARTY_DIR = '/var/www/livingnatural/php/lib/smarty';
    const SMARTY_CONF_DIR = '/var/www/livingnatural/php/conf/smarty';
    const SMARTY_CONFIGS_DIR = '/var/www/livingnatural/php/conf/smarty/configs';
    const SMARTY_CACHE_DIR = '/var/www/livingnatural/php/conf/smarty/cache';
    const SMARTY_COMPILE_DIR = '/var/www/livingnatural/php/conf/smarty/templates_c';

    // db
    const DB_NAME = 'livingnatural';
    const DB_USER = 'livingnatural_admin';
    const DB_PASSWORD = 'livingnatural';
    const DB_HOST = 'localhost';
    const DB_PORT = '3306';
}