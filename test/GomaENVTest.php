<?php
namespace Goma\ENV\Test;

use Goma\ENV\GomaENV;

defined("IN_GOMA") or die();
/**
 * Test GomaENV.
 *
 * @package goma/env
 * @author Goma-Team
 * @license	GNU Lesser General Public License, version 3; see "LICENSE.txt"
 * @copyright Goma-Team
 */

class GomaENVTest extends \GomaUnitTest
{
    /**
     * Tests getCommandLineArgs function with some examples.
     *
     * 1. Assert that GomaENV::getCommandLineArgs(array("--index", "-user=1")) returns
     * array(
     *   '--index' => '--index',
     *   '-user' => '1'
     * )
     */
    public function testgetCommandLineArgs() {
        $this->assertEqual(array(
            "--index" => "--index",
            "-user" => "1"
        ), GomaENV::getCommandLineArgs(array(
            "--index", "-user=1"
        )));
    }

    /**
     * tests if isPHPUnit returns true in this case.
     */
    public function testIsPHPUnit() {
        $this->assertTrue(GomaENV::isPHPUnit());
    }

    /**
     * tests if isCommandLineInterface returns true in this case.
     */
    public function testIsCommandLineInterface() {
        $this->assertTrue(GomaENV::isCommandLineInterface());
    }

    /**
     * tests if getRoot works if project is this project and not embedded.
     */
    public function testGetRootThisProject() {
        $this->assertEqual("/var/www/", GomaENV::getRoot("/var/www/src"));
    }

    /**
     * tests if getRoot works if project is embedded.
     */
    public function testGetRootEmbeddedProject() {
        $this->assertEqual("/var/www/", GomaENV::getRoot("/var/www/vendor/goma/goma-env/src"));
    }

    /**
     * tests if getProjectLevelComposerArray returns an array
     */
    public function testGetProjectLevelComposerJSON() {
        $this->assertTrue(is_array(GomaENV::getProjectLevelComposerArray()));
    }
}
