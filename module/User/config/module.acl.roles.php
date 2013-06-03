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
    ),
    'admin'=> array(
         array('user', 'auth::testadmin'), 
    ),
);