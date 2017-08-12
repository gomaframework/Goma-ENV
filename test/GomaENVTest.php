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
}
