<?php
/**
 * Tests help command.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
class HelpCommandTest extends AyucoTestCase
{
    /**
     * Tests missing setname command error.
     */
    public function test()
    {
        $this->assertCommand('------------------------------', 'help');
    }
}