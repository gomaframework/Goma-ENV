<?php

namespace Goma\ENV\Test;

/**
 * Checks for defined constants.
 *
 * @package goma/env/test
 * @author Goma-Team
 * @license	GNU Lesser General Public License, version 3; see "LICENSE.txt"
 * @copyright Goma-Team
 */
class DefinitionTest extends \GomaUnitTest
{
    public function testInGoma() {
        $this->assertTrue(defined("IN_GOMA"));
    }

    public function testROOT() {
        $this->assertTrue(defined("ROOT"));
    }

    public function testCache() {
        $this->assertTrue(defined("CACHE_DIRECTORY"));
    }

    public function testData() {
        $this->assertTrue(defined("GOMA_DATADIR"));
    }

    public function testExecStartTime() {
        $this->assertTrue(defined("EXEC_START_TIME"));
    }

    public function testDevMode() {
        $this->assertTrue(defined("DEV_MODE"));
    }
}
