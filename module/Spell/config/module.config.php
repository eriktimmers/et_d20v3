<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Spell\Controller\Spell' => 'Spell\Controller\SpellController', 
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'spell' => array(
                'type' => 'segment',
                'options' => array(
                    'route'         => '/spell[/][:action][/:id]',
                    'constraints'   => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Spell\Controller\Spell',
                        'action'     => 'index',
                    ),
1                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'spell' => __DIR__ . '/../view/',
        ),
        'template_map' => array(
            'partial/spellrow' => __DIR__ . '/../view/partial/spellrow.phtml',
        ),        
    ),
    
    'view_helpers' => array(
        'invokables'=> array(
            'iconhelper' => 'Spell\View\Helper\Iconhelper'  
        )
    ),    
);