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
         array('spell', 'spell::index'),
         array('spell', 'spell::view'),
    ),
    'admin'=> array(
         array('user', 'auth::testadmin'), 
         array('spell', 'spell::edit'),
         array('spell', 'spell::delete'),
         array('spell', 'spell::copy'),
        
    ),
);