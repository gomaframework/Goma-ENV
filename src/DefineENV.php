<?php
use Goma\ENV\GomaENV;
/**
 * Defines environment constants.
 *
 * @package goma/env
 * @author Goma-Team
 * @license	GNU Lesser General Public License, version 3; see "LICENSE.txt"
 * @copyright Goma-Team
 */

defined("EXEC_START_TIME") OR define("EXEC_START_TIME", microtime(true));
define("IN_GOMA", 1);

define("ROOT", GomaENV::getRoot());
define("APPLICATION", isset(GomaENV::getProjectLevelComposerArray()["goma_datadir"]) ? GomaENV::getProjectLevelComposerArray()["goma_datadir"] : "mysite");
define("CACHE_DIRECTORY", isset(GomaENV::getProjectLevelComposerArray()["goma_tempdir"]) ?
    APPLICATION . "/" . GomaENV::getProjectLevelComposerArray()["goma_datadir"] . "/" : APPLICATION . "/temp/");

if(!is_dir(ROOT . APPLICATION)) {
    mkdir(ROOT . APPLICATION);
}

if(!is_dir(ROOT . CACHE_DIRECTORY)) {
    mkdir(ROOT . CACHE_DIRECTORY);
}

// write tests
if(file_put_contents(ROOT . APPLICATION . "/write.test", "") !== false) {
    @unlink(ROOT . APPLICATION . "/write.test");
} else {
    throw new Exception("Write-Test failed. Please allow write at /" . APPLICATION);
}

// write tests cache
if(file_put_contents(ROOT . CACHE_DIRECTORY . "/write.test", "") !== false) {
    @unlink(ROOT . CACHE_DIRECTORY . "/write.test");
} else {
    throw new Exception("Write-Test failed. Please allow write at /" . CACHE_DIRECTORY);
}
