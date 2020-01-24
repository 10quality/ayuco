<?php
/**
 * Tests setup command.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
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