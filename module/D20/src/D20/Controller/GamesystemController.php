<?php

namespace D20\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use D20\Form\GamesystemForm;
use D20\Model\Gamesystem;

/**
 * Description of SpellController
 *
 * @author erik
 */
class GamesystemController extends AbstractActionController {
    
    protected $gamesystemTable;
    
    public function indexAction()
    {
        return new ViewModel(array(
            'gamesystems' => $this->getGamesystemTable()->fetchAll(),
        ));
    }
    
    public function editAction()
    {
        $form = new GamesystemForm();
        $resultMsg = '';

        $request = $this->getRequest();
        if ($request->isPost()) {       
            $gamesystem = new Gamesystem();
            $form->setInputFilter($gamesystem->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                //var_dump($form->getData());
                $gamesystem->exchangeArray($form->getData());
                $this->getGamesystemTable()->saveGamesystem($gamesystem);
                
                return $this->redirect()->toRoute('d20');
            }
            
        } else {
            $id = (int)$this->params()->fromRoute('id', 0); 
            
            try {
                $gamesystem = $this->getGamesystemTable()->getGamesystem($id);
                $form->bind($gamesystem);
            } catch (\Exception $ex) {
            }
        }

        return new ViewModel(array(
            'id' => $id,
            'form' => $form,
            'resultMsg' => $resultMsg,
        ));        
    }
    
    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        $this->getGamesystemTable()->deleteGamesystem($id);
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }   
    
    public function getGamesystemTable()
    {
        if (!$this->gamesystemTable) {
            $sm = $this->getServiceLocator();
            $this->gamesystemTable = $sm->get('\D20\Model\GamesystemTable');
        }
        return $this->gamesystemTable;
    }
}