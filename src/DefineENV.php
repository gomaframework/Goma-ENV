<?php
/**
 * Defines environment constants.
 *
 * @package goma/env
 * @author Goma-Team
 * @license	GNU Lesser General Public License, version 3; see "LICENSE.txt"
 * @copyright Goma-Team
 */

use Goma\ENV\GomaENV;

define("IN_GOMA", 1);

define("ROOT", GomaENV::getRoot());
define("APPLICATION", isset(GomaENV::getProjectLevelComposerArray()["goma_datadir"]) ? GomaENV::getProjectLevelComposerArray()["goma_datadir"] : "mysite");
define("CACHE_DIRECTORY", isset(GomaENV::getProjectLevelComposerArray()["goma_tempdir"]) ?
    APPLICATION . "/" . GomaENV::getProjectLevelComposerArray()["goma_datadir"] . "/" : APPLICATION . "/temp/");
