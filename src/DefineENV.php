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
define("GOMA_DATADIR", isset(GomaENV::getProjectLevelComposerArray()["goma_datadir"]) ? GomaENV::getProjectLevelComposerArray()["goma_datadir"] : "mysite");
define("CACHE_DIRECTORY", isset(GomaENV::getProjectLevelComposerArray()["goma_tempdir"]) ?
    GOMA_DATADIR . "/" . GomaENV::getProjectLevelComposerArray()["goma_datadir"] . "/" : GOMA_DATADIR . "/temp/");
define("DEV_MODE", GomaENV::isDevMode());

if(!is_dir(ROOT . GOMA_DATADIR)) {
    mkdir(ROOT . GOMA_DATADIR);
}

if(!is_dir(ROOT . CACHE_DIRECTORY)) {
    mkdir(ROOT . CACHE_DIRECTORY);
}

// write tests
if(file_put_contents(ROOT . GOMA_DATADIR . "/write.test", "") !== false) {
    @unlink(ROOT . GOMA_DATADIR . "/write.test");
} else {
    throw new Exception("Write-Test failed. Please allow write at /" . GOMA_DATADIR);
}

// write tests cache
if(file_put_contents(ROOT . CACHE_DIRECTORY . "/write.test", "") !== false) {
    @unlink(ROOT . CACHE_DIRECTORY . "/write.test");
} else {
    throw new Exception("Write-Test failed. Please allow write at /" . GOMA_DATADIR);
}
