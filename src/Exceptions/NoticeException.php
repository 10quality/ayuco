<?php

namespace Ayuco\Exceptions;

use Exception;
use Ayuco\Coloring;

/**
 * Notice Exception.
 * - Exceptions that should be notified on command-line.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.4
 */
class NoticeException extends Exception
{
    /**
     * Constructor.
     * @since 1.0.4
     * 
     * @param string     $message
     * @param int        $code
     * @param \Throwable $previous
     */
    public function __construct($message = '', $code = 0, $previous = null)
    {
        parent::__construct(Coloring::apply('color_09', $message), $code, $previous);
    }
}