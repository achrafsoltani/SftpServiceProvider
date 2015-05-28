# SftpServiceProvider

A Simple SFTP wrapper for Silex



Features
--------
* Easy setup.
* Files : List, Upload, Download, Rename, Delete.
* Folders: List, Mkdir, Rename, Delete.

Requirements
------------
 * PHP 5.3+
 * ext-ssh2
 * monolog/monolog (through the MonologServiceProvider)
  
Dependencies
------------ 
```sh
// Installing php-ssh2
$ sudo apt-get install libssh2-php
// checking if all is good
$ php -m |grep ssh2 
```

Installation
------------ 
```sh
$ composer require achrafsoltani/sftp-service-provider
```
Setup
------------
``` {.php}
require_once __DIR__.'/vendor/autoload.php';

use Silex\Application;
use AchrafSoltani\Provider\SftpServiceProvider;
use Silex\Provider\MonologServiceProvider;

$app = new Application();

// Monolog
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/logs/development.log',
));

// SFTP
$app->register(new SftpServiceProvider(), array(
    'sftp.options' => array(
        'hostname' => 'domain.tld', // or IP address
        'username' => 'root',
        'password' => 'your_ssh_password',
        'port'     => '22' // optional
    )
));

// Usage

$app->run();
```
Usage
------------
* Example 1 : Listing files in a directory

``` {.php}
$dirs = $app['sftp']->list_files('/home/user/');
var_dump($dirs);
```

* Example 2 : Downloading a File

``` {.php}
$app['sftp']->download('/home/user/source_file.ext', '/home/user/path/to/destination/downloaded.ext');
```

