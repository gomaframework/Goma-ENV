<?php

namespace Goma\ENV;

/**
 * Goma environment class.
 *
 * @package goma/env
 * @author Goma-Team
 * @license	GNU Lesser General Public License, version 3; see "LICENSE.txt"
 * @copyright Goma-Team
 */
class GomaENV
{
    /**
     * cache variable for isCommandLineInterface()
     *
     * @var null|bool
     */
    private static $isCommandLineInterface = null;

    /**
     * cache for composer.json
     *
     * @var array|null
     */
    private static $composerCache = null;

    /**
     * @param null|string $dir
     * @return bool|string
     */
    public static function getRoot($dir = null) {
        if(!isset($dir)) {
            $dir = dirname(__FILE__);
        }

        $vendorPath = "vendor/goma/goma-env/src";
        if(substr($dir, 0 - strlen($vendorPath)) == $vendorPath) {
            return substr($dir, 0, strlen($dir) - strlen($vendorPath));
        }

        return substr($dir, 0, -3);
    }

    /**
     * returns full path of data-directory.
     *
     * @return string
     */
    public static function getDataDirectory() {
        return self::getRoot() . APPLICATION . "/";
    }

    /**
     * returns full path of cache-directory.
     *
     * @return string
     */
    public static function getCacheDirectory() {
        return self::getRoot() . CACHE_DIRECTORY;
    }

    /**
     * returns command line arguments as assoc array.
     * for example: php index.php --index -user=1 will return
     * array(
     *   '--index' => '--index',
     *   '-user' => '1'
     * )
     *
     * @param array|null $args
     * @return array
     */
    public static function getCommandLineArgs($args = null) {
        if(!isset($args)) {
            $args = isset($_SERVER["argv"]) ? $_SERVER["argv"] : array();
        }

        $parsedArgs = array();
        foreach($args as $arg) {
            $parts = explode("=", $arg);
            if(isset($parts[1])) {
                $parsedArgs[$parts[0]] = $parts[1];
            } else {
                $parsedArgs[$parts[0]] = $parts[0];
            }
        }
        return $parsedArgs;
    }

    /**
     * returns if php-unit is active.
     * @param array|null $args
     * @return bool
     */
    public static function isPHPUnit($args = null) {
        if(!isset($args)) {
            $args = isset($_SERVER["argv"]) ? $_SERVER["argv"] : array();
        }

        return isset($args[0]) && strpos($args[0], "phpunit") !== false;
    }

    /**
     * returns if --dev was set in command line.
     *
     * @param array|null $args
     * @return bool
     */
    public static function isDevModeCLI($args = null) {
        $args = self::getCommandLineArgs($args);

        return isset($args["--dev"]);
    }

    /**
     * returns if this env is in dev-mode.
     * @return bool
     */
    public static function isDevMode() {
        if(isset(self::getProjectLevelComposerArray()["goma_dev_mode"])) {
            return (bool) self::getProjectLevelComposerArray()["goma_dev_mode"];
        }

        return false;
    }

    /**
     * returns if command line interface.
     *
     * @return bool|null
     */
    public static function isCommandLineInterface()
    {
        if(!isset(self::$isCommandLineInterface)) {
            self::$isCommandLineInterface = (!isset($_SERVER['SERVER_SOFTWARE']) && (php_sapi_name() == 'cli' || (is_numeric($_SERVER['argc']) && $_SERVER['argc'] > 0)));
        }

        return self::$isCommandLineInterface;
    }

    /**
     * returns memory limit in int. if it is not determinable this returns $default
     *
     * @param int $default
     * @return int
     */
    public static function getMemoryLimit($default = 64 * 1024 * 1024) {
        if(function_exists("ini_get")) {
            $memory_limit = ini_get('memory_limit');
            if (preg_match('/^(\d+)(.)$/', $memory_limit, $matches)) {
                if ($matches[2] == 'M') {
                    return $matches[1] * 1024 * 1024; // nnnM -> nnn MB
                } else if ($matches[2] == 'K') {
                    return $matches[1] * 1024; // nnnK -> nnn KB
                }
            }
        }

        return $default;
    }

    /**
     * decodes and returns composer.json at root.
     * @param string|null $dir directory in which this class is
     * @return array|mixed|null
     */
    public static function getProjectLevelComposerArray($dir = null) {
        if(!isset(self::$composerCache)) {
            self::$composerCache = json_decode(file_get_contents(self::getRoot($dir) . "composer.json"), true);
        }

        return self::$composerCache;
    }
}
