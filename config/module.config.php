<?php

return array(
    'console' => array(
        'router' => array(
            'routes' => array(
                'say-hello' => array(
                    'type' => 'simple',
                    'options' => array(
                        'route' => 'say hello',
                        'defaults' => array(
                            'controller' => 'Cli\Controller\ExampleController',
                            'action' => 'sayhello',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'Cli\Service\AuthService' => 'Cli\Service\AuthService',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Cli\Controller\ExampleController' => 'Cli\Controller\ExampleControllerFactory'
        ),
    ),
);
