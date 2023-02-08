<?php

use Ayuco\Coloring;
use PHP_Parallel_Lint\PhpConsoleColor\ConsoleColor;

/**
 * Tests coloring class.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.4
 */
class ColoringTest extends AyucoTestCase
{
    /**
     * Tests static method.
     * @since 1.0.4
     * 
     * @test
     * @group coloring
     */
    public function testHandler()
    {
        // Run
        $handler = Coloring::handler();
        // Assert
        $this->assertNotEmpty($handler);
        $this->assertInstanceOf(ConsoleColor::class, $handler);
    }
    /**
     * Tests static method.
     * @since 1.0.4
     * 
     * @test
     * @group coloring
     */
    public function testApply()
    {
        // Run
        $text = Coloring::apply('color_09', 'text');
        // Assert
        $this->assertNotEmpty($text);
        $this->assertEquals(Coloring::handler()->apply('color_09', 'text'), $text);
    }
}