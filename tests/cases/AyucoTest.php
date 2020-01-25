<?php

use Ayuco\Listener;
/**
 * Tests general Ayuco functionality.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
class AyucoTest extends AyucoTestCase
{
    /**
     * Tests command registration.
     * @since 1.0.0
     */
    public function testRegisterCommand()
    {
        // Prepare
        $ayuco = new Listener();
        $ayuco->register(new TestCommand);

        $this->assertNotNull($ayuco->get('test'));
    }
    /**
     * Tests unknown command.
     * @since 1.0.0
     */
    public function testUnknownCommand()
    {
        $this->assertCommand('Command "unknown" not found.', 'unknown');
    }
}