# Ayuco

[![Latest Stable Version](https://poser.pugx.org/10quality/ayuco/v/stable)](https://packagist.org/packages/10quality/ayuco)
[![Total Downloads](https://poser.pugx.org/10quality/ayuco/downloads)](https://packagist.org/packages/10quality/ayuco)
[![License](https://poser.pugx.org/10quality/ayuco/license)](https://packagist.org/packages/10quality/ayuco)

Command-Line interface that can be used to execute commands written in PHP.

**Note:** Commands included in this package (excluding help command) were written for Wordpress-MVC.

## Usage

Create a php file that will be called in command-line, [Sample](https://github.com/10quality/ayuco/blob/v1.0/tests/environments/plugin/ayuco), and include the following code lines:

```php
use Ayuco\Listener;
```

Create a listener:
```php
$ayuco = new Listener();

// or without use
$ayuco = new Ayuco\Listener()
```

Register your commands.
```php
$ayuco->register($command1)
    ->register($command2)
    ->register(new MyCommand);
```

Start interpreting or listening:
```php
$ayuco->interpret();
```

Use in command line:
```bash
php filename command_key arguments
```

If `filename` is named `ayuco.php` and `command_key` is `clear_cache`, command in *command-line* will be:

```bash
php ayuco.php clear_cache
```

### Create a custom command

Create your own class command by extending from Ayuco base command class:
```php
use Ayuco\Command;

class MyCommand extends Command
{
    protected $key = 'command_key';

    protected $description = 'My command description.';

    public function call($args = [])
    {
        // TODO command action.
    }
}
```

Example for a clear cache command.

```php
use Ayuco\Command;

class ClearCacheCommand extends Command
{
    protected $key = 'clear_cache';

    protected $description = 'Clears system cache.';

    public function call($args = [])
    {
        Cache::flush(); // Example
    }
}
```

Registration in listener would be:
```php
$ayuco->register(new ClearCacheCommand);
```

### Help command

AYUCO automatically will register its own `help` command. This command can be used to display in `command-line` the list of registered commands, use it like:

```bash
php ayuco.php help
```

## Requirements

* PHP >= 5.4

## Coding guidelines

PSR-4.

## LICENSE

The MIT License (MIT)

Copyright (c) 2016 [10Quality](http://www.10quality.com).