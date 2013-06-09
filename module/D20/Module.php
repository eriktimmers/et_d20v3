<?php
namespace D20;

use Zend\Mvc\ModuleRouteListener;
use D20\Model\Gamesystem;
use D20\Model\GamesystemTable;
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
                '\D20\Model\GamesystemTable' => function($sm) {
                    $tableGateway = $sm->get('GamesystemTableGateway');
                    $table = new GamesystemTable($tableGateway);
                    return $table;
                },
                'GamesystemTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Gamesystem());
                    return new TableGateway('gamesystem', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
    
    
}
