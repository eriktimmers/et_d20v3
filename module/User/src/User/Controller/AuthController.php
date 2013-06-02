<?php
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\Result as Result;
use User\Form\LoginForm;

/**
 * Description of LoginController
 *
 * @author erik
 */
class AuthController extends AbstractActionController {
    
    public function indexAction()
    {
        $auth = new AuthenticationService();
        
        $identity = null;
        if ($auth->hasIdentity()) {
            $identity = $auth->getIdentity();
        }
        
        return array(
            'identity' => $identity,
        );
    }
    
    public function loginAction()
    {
        $form = new LoginForm();
        $resultMsg = '';

        $request = $this->getRequest();
        if ($request->isPost()) {
            // get post data
            $post = $request->getPost();
            
            if ($post->get('username')) {

                $sm = $this->getServiceLocator();
                $dbAdapter = $sm->get('\Zend\Db\Adapter\Adapter');

                $authAdapter = new AuthAdapter($dbAdapter);

                $authAdapter->setTableName('user')
                        ->setIdentityColumn('username')
                        ->setCredentialColumn('password');

                $authAdapter->setIdentity($post->get('username'))
                        ->setCredential(md5($post->get('password')));

                $authService = new AuthenticationService();
                $authService->setAdapter($authAdapter);

                $result = $authService->authenticate();

                if ($result->isValid()) {
                    $storage = $authService->getStorage();
                    $storage->write($authAdapter->getResultRowObject(array(
                        'username', 
                        'role',
                    )));
                    return $this->redirect()->toRoute('auth');
                } else {
                    $resultMsg = 'Inlog niet correct';
                }
            }
            
        }
        
        return array('form' => $form,
                     'resultMsg' => $resultMsg
                    );
    }
 
    public function logoffAction()
    {
        $auth = new AuthenticationService();
        $auth->clearIdentity();
        
        return $this->redirect()->toRoute('auth');
    }
    
    public function testuserAction()
    {
        
    }
    
    public function testadminAction()
    {
        
    }
    
}

?>
