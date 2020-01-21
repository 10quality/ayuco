<?php

namespace Ayuco\Commands;

use Ayuco\Command;
use Ayuco\Exceptions\NoticeException;

/**
 * Command that setups project.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
class SetupCommand extends Command
{
    /**
     * Command key.
     * @since 1.0.0
     * @var string
     */
    protected $key = 'setup';

    /**
     * Command description.
     * @since 1.0.1
     * @var string
     */
    protected $description = 'WordPress MVC setup wizard.';

    /**
     * Calls to command action.
     * @since 1.0.0
     *
     * @param array $args Action arguments.
     */
    public function call($args = [])
    {
        $command = $this->listener->get('setname');
        if (!$command)
            throw new NoticeException('Command "setup": setname command is not registered in ayuco.');
            
        try {
            $this->_lineBreak();
            $this->_print('------------------------------');
            $this->_lineBreak();
            $this->_print('WordPress MVC (AYUCO) Setup');
            $this->_lineBreak();
            $this->_print('------------------------------');
            $this->_lineBreak();
            $this->_print('Enter your project\'s namespace (example: MyProject):');
            $this->_lineBreak();
            $namespace = $this->listener->getInput();
            $namespace = empty($namespace) ? 'MyProject' : str_replace(' ', '', ucwords(strtolower($namespace)));        
            $command->setName($namespace);
            $this->_print('------------------------------');
            $this->_lineBreak();
            $this->_print('Your plugin namespace is "%s"', $namespace);
            $this->_lineBreak();
            $this->_print('Setup completed!');
            $this->_lineBreak();
            $this->_print('------------------------------');
            $this->_lineBreak();
        } catch (NoticeException $e) {
            throw new NoticeException('Command "setup": Failed! ' . $e->getMessage());
        }
    }
}