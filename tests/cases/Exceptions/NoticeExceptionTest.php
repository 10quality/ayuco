<?php

use Ayuco\Coloring;
use Ayuco\Exceptions\NoticeException;

/**
 * Test exception class.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.4
 */
class NoticeExceptionTest extends AyucoTestCase
{
    /**
     * Tests static method.
     * @since 1.0.4
     * 
     * @test
     * @group exceptions
     */
    public function testConstructor()
    {
        // Run
        $exception = new NoticeException('A message');
        // Assert
        $this->assertEquals(Coloring::handler()->apply('color_09', 'A message'), $exception->getMessage());
    }
}