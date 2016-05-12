<?php

use Ayuco\Listener;
/**
 * Tests general Ayuco functionality.
 * @author Alejandro Mostajo <http://www.10quality.com>
 * @package Ayuco
 * @copyright MIT
 */
class AyucoTest extends AyucoTestCase
{
    /**
     * Tests command registration.
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
     */
    public function testUnknownCommand()
    {
        $this->assertCommand('unknown', 'Command "unknown" not found.');
    }
}