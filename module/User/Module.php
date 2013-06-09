<?php
namespace User;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Authentication\AuthenticationService;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;

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
    
    public function onBootstrap(MvcEvent $e)
    {
        $this->initAcl($e);
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach('route', array($this, 'checkAuth'));      
    }    
    
    public function checkAuth(MvcEvent $e) 
    {
        $auth = new AuthenticationService();
        
        $role = 'free';
        if ($auth->hasIdentity()) {
            $role = $auth->getIdentity()->role;
        }
        
        $routeMatch = $e->getRouteMatch();
        //var_dump($routeMatch);die();
        
        $controllerClass = $routeMatch->getParam('controller', 'not-found');
        $moduleName = strtolower(substr($controllerClass, 0, strpos($controllerClass, '\\')));
        $controllerName = strtolower(substr($controllerClass, strrpos($controllerClass, '\\')+1));
        $actionName = strtolower($routeMatch->getParam('action', 'not-found'));
        
        $acl = $e->getViewModel()->acl;
        if (!$acl->isAllowed($role, $moduleName, $controllerName . '::'  .$actionName)){
            $router = $e->getRouter();
            $url    = $router->assemble(array(), array('name' => 'application'));
            $response = $e->getResponse();
            $response->setStatusCode(302);
            // redirect to login page or other page.
            $response->getHeaders()->addHeaderLine('Location', $url);    
        }
        
    }      
    
    private function initAcl(MvcEvent $e)
    {
        $acl = new Acl();
        $roles = include __DIR__ . '/config/module.acl.roles.php';
        
        $acl->addResource('application'); // Application module
        $acl->addResource('user'); // User module   
        $acl->addResource('spell');
        $acl->addResource('d20');

        
        $parents = array();
        foreach($roles as $role=>$roleAccess) {
            $acl->addRole(new Role($role), $parents);
            $parents[] = $role;
        }
        foreach($roles as $role=>$roleAccess) {     
            foreach($roleAccess as $access) {
                $acl->allow($role, $access[0], $access[1]);
            }
        }        
        
        //setting to view
        $e->getViewModel()->acl = $acl;        
        //var_dump($acl->isAllowed('free', 'user', 'auth::hdhdh'));
        
    }

}
