<?php
/**
 * Tests setup command.
 * @author Alejandro Mostajo <http://www.10quality.com>
 * @package Ayuco
 * @copyright MIT
 */
class SetupCommandTest extends AyucoTestCase
{
    /**
     * Tests missing setname command error.
     */
    public function testMissingSetname()
    {
        $this->builder->register('Ayuco\Commands\SetupCommand');

        $this->assertCommand('setup', 'Command "setup": setname command is not registered in ayuco.');
    }
}