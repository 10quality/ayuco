<?php

namespace Ayuco\Commands;

use Ayuco\Command;
use Ayuco\Exceptions\NoticeException;

/**
 * Command that sets project name.
 *
 * @author Alejandro Mostajo <http://www.10quality.com>
 * @package Ayuco
 * @copyright MIT
 * @version 1.0.0
 */
class SetNameCommand extends Command
{
    /**
     * Command key.
     * @since 1.0.0
     * @var string
     */
    protected $key = 'setname';

    /**
     * Projects root path.
     * @since 1.0.0
     * @var string
     */
    protected $rootPath;

    /**
     * Default controller.
     * @since 1.0.0
     *     
     * @param string $rootPath Projects root path
     */
    public function __construct($rootPath)
    {
        $this->rootPath = $rootPath;
    }

    /**
     * Calls to command action.
     * @since 1.0.0
     *
     * @param array $args Action arguments.
     */
    public function call($args = [])
    {
        if (count($args) == 0 || empty($args[0]))
            throw new NoticeException('Command "'. $key . '": Expecting a name.');

        $this->setName($args[0]);
    }

    /**
     * Sets project name.
     * @since 1.0.0
     *
     * @param string $name Project name.
     */
    public function setName($name)
    {
        if (empty($name))
            throw new NoticeException('Command "'. $key . '": No name given.');

        // Checkfor MVC configuration file
        $configFilename = file_exists($this->rootPath . '/config/plugin.php')
            ? $this->rootPath . '/config/plugin.php'
            : (file_exists($this->rootPath . '/config/theme.php')
                ? $this->rootPath . '/config/theme.php'
                : null
            );

        if (empty($configFilename))
            throw new NoticeException('Command "'. $key . '": No configuration file found.');

        $config = require_once $configFilename;
        $currentname = $config['namespace'];

        $type = preg_match('/plugin\.php/', $configFilename) ? 'plugin' : 'theme';

        replace_in_file($currentname, $name, $configFilename);

        replace_in_file( 
            'namespace ' . $currentname,
            'namespace ' . $name
            , $this->rootPath.'/'.$type.'/Main.php'
        );

        foreach (scandir($this->rootPath.'/'.$type.'/models') as $filename) {
            replace_in_file( 
                'namespace ' . $currentname,
                'namespace ' . $name,
                $this->rootPath.'/'.$type.'/models/' . $filename
            );
        }

        foreach (scandir($config['paths']['controllers']) as $filename) {
            replace_in_file( 
                'namespace ' . $currentname,
                'namespace ' . $name,
                $config['paths']['controllers'] . $filename
            );
            replace_in_file( 
                'use ' . $currentname,
                'use ' . $name,
                $config['paths']['controllers'] . $filename
            );
        }

        replace_in_file( 
            '"' . $currentname,
            '"' . $name,
            $this->rootPath . '/composer.json'
        );

        exec( 'composer dump-autoload' );
    }

    /**
     * Replaces needle in file.
     *
     * @param string $needle  Needle to replace with.
     * @param string $replace What to replace with.
     * @param string $filename
     */
    private function replaceInFile($needle, $replace, $filename)
    {
        if ($filename == '.' || $filename == '..') return;
        file_put_contents( 
            $filename, 
            preg_replace(
                '/' . $needle . '/',
                $replace,
                file_get_contents($filename)
            ) 
        );
    }
}