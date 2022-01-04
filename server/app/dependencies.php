<?php

declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Illuminate\Database\Capsule\Manager;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions(
        [
            LoggerInterface::class => function (ContainerInterface $c) {
                $settings = $c->get(SettingsInterface::class);

                $loggerSettings = $settings->get('logger');
                $logger         = new Logger($loggerSettings['name']);

                $processor = new UidProcessor();
                $logger->pushProcessor($processor);

                $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
                $logger->pushHandler($handler);

                return $logger;
            },
            // connection interface for eloquent
            Manager::class         => function (ContainerInterface $c) {
                $settings = $c->get(SettingsInterface::class);

                $capsule = new Manager();

                $dbSettings = $settings->get('db');

                $capsule->addConnection(
                    array(
                        'driver'    => $dbSettings['driver'],
                        'host'      => $dbSettings['host'],
                        'database'  => $dbSettings['database'],
                        'username'  => $dbSettings['username'],
                        'password'  => $dbSettings['password'],
                        'port'      => $dbSettings['port'],
                        'charset'   => 'utf8',
                        'collation' => 'utf8_unicode_ci',
                        'prefix'    => '',
                    )
                );


                $capsule->setAsGlobal();
                $capsule->bootEloquent();

                return $capsule;
            },

        ]
    );
};
