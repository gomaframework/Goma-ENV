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
    static function getCommandLineArgs($args = null) {
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
}
