<?php
namespace Spell;

use Zend\Mvc\ModuleRouteListener;
use Spell\Model\Spell;
use Spell\Model\SpellTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

/**
 * Description of Module
 *
 * @author erik
 */
class Module 
{
    public function getAutoloaderConfig() 
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                '\Spell\Model\SpellTable' => function($sm) {
                    $tableGateway = $sm->get('SpellTableGateway');
                    $table = new SpellTable($tableGateway);
                    return $table;
                },
                'SpellTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Spell());
                    return new TableGateway('spell', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
    
    
}
