<?php

return array(
    'free' => array(
        array('application', 'index::index'),
        array('user', 'auth::index'),
        array('user', 'auth::login'),
        array('user', 'auth::logoff'),
    ),
    'user'=> array(
         array('user', 'auth::testuser'),
         array('d20',  'index::index'),
         array('spell', 'spell::index'),
         array('spell', 'spell::view'),
    ),
    'admin'=> array(
         array('user', 'auth::testadmin'), 
         array('d20', 'gamesystem::index'),
         array('d20', 'gamesystem::view'),
         array('d20', 'gamesystem::edit'),
         array('d20', 'gamesystem::delete'),
         array('spell', 'spell::edit'),
         array('spell', 'spell::delete'),
         array('spell', 'spell::copy'),
        
    ),
);