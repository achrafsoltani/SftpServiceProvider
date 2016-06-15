<?php
/**
 * SftpServiceProvider
 *
 * A Simple SFTP wrapper for Silex
 *
 * @package		AchrafSoltani\Provider;
 * @author		Achraf Soltani <achraf.soltani@gmail.com>
 * @date        05/28/2015
 * @file        SftpServiceProvider.php
 */
 
namespace AchrafSoltani\Provider;

use Silex\Application;
use Pimple\ServiceProviderInterface;
use Pimple\Container;
use AchrafSoltani\Client\Sftp;
/**
 * Class MailgunServiceProvider
 * @package AchrafSoltani\Provider
 */
class SftpServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        
        $app['sftp'] = function () use ($app) 
        {
            $sftp = new Sftp($app['sftp.options'], $app['monolog']); 
            $sftp->connect();
            return $sftp;
        };
    }
}