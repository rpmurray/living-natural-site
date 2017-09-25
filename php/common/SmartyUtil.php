<?php
/**
 * User: rmurray
 * Date: 9/24/2017
 * Time: 11:03 AM
 */
namespace common;

require_once 'common.php';
require_once(SMARTY_DIR . 'Smarty.class.php');

/**
 *
 */
class SmartyUtil {
    /** @var \Smarty */
    private $smarty;

    /**
     * @param string $module
     */
    public function __construct($module) {
        // init
        $this->smarty = new \Smarty();

        // configure
        $this->smarty->setTemplateDir(PHP_DIR . $module . '/view/templates/');
        $this->smarty->setCompileDir(SMARTY_COMPILE_DIR);
        $this->smarty->setConfigDir(SMARTY_CONFIGS_DIR);
        $this->smarty->setCacheDir(SMARTY_CACHE_DIR);

        // define common properties
        $this->smarty->assign('_css', '../css');
        $this->smarty->assign('_resources', '../resources');
        $this->smarty->assign('_html', '../html');
        $this->smarty->assign('_js', '../js');
        $this->smarty->assign('_php', '../php');
    }

    /**
     * @param bool $enabled
     */
    public function setDebug($enabled) {
        $this->smarty->debugging = $enabled;
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @param bool   $noCache
     */
    public function assign($key, $value, $noCache = false) {
        $this->smarty->assign($key, $value, $noCache);
    }

    /**
     * @param string $template
     */
    public function render($template) {
        $this->smarty->display($template);
    }
}
