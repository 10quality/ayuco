<?php
/**
 * Tests help command.
 * @author Alejandro Mostajo <http://www.10quality.com>
 * @package Ayuco
 * @copyright MIT
 */
class HelpCommandTest extends AyucoTestCase
{
    /**
     * Tests missing setname command error.
     */
    public function test()
    {
        $this->assertCommand('help', '------------------------------');
    }
}