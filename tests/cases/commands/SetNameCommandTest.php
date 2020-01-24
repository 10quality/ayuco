<?php
/**
 * Tests setname command.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
class SetNameCommandTest extends AyucoTestCase
{
    /**
     * Tests expecting anme error.
     */
    public function testMissingName()
    {
        $this->builder->register(
            'Ayuco\Commands\SetNameCommand',
            $this->env['plugin']['path']
        );

        $this->assertCommand('setname', 'Command "setname": Expecting a name.');
    }

    /**
     * Tests plugin name change.
     */
    public function testPlugin()
    {
        $this->builder->register(
            'Ayuco\Commands\SetNameCommand',
            $this->env['plugin']['path']
        );

        $this->assertCommand('setname '.$this->env['plugin']['namespace'], 'Namespace changed!');
    }

    /**
     * Tests theme name change.
     */
    public function testTheme()
    {
        $this->builder->register(
            'Ayuco\Commands\SetNameCommand',
            $this->env['theme']['path']
        );

        $this->assertCommand('setname '.$this->env['theme']['namespace'], 'Namespace changed!');
    }
}