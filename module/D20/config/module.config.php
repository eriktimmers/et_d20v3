<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'D20\Controller\Gamesystem' => 'D20\Controller\GamesystemController', 
            'D20\Controller\Index'      => 'D20\Controller\IndexController', 
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'd20' => array(
                'type' => 'segment',
                'options' => array(
                    'route'         => '/d20[/][:action][/:id]',
                    'constraints'   => array(
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'         => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'D20\Controller\Index',
                        'action'     => 'index',
                    ),
1                ),
            ),
            'd20gamesystem' => array(
                'type' => 'segment',
                'options' => array(
                    'route'         => '/d20/gamesystem[/][:action][/:id]',
                    'constraints'   => array(
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'         => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'D20\Controller\Gamesystem',
                        'action'     => 'index',
                    ),
1                ),
            ),            
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'd20' => __DIR__ . '/../view/',
        ),
        'template_map' => array(
            'partial/gamesystemrow' => __DIR__ . '/../view/partial/d20basicrow.phtml',
        ),        
    ), 
);