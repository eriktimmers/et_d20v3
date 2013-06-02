<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'User\Controller\Auth' => 'User\Controller\AuthController', 
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'auth' => array(
                'type' => 'segment',
                'options' => array(
                    'route'         => '/login[/][:action][/:id]',
                    'constraints'   => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'User\Controller\Auth',
                        'action'     => 'index',
                    ),
1                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'user' => __DIR__ . '/../view/',
        ),
    ),
);