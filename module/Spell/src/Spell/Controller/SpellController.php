<?php

namespace Spell\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Spell\Form\SpellForm;
use Spell\Model\Spell;

/**
 * Description of SpellController
 *
 * @author erik
 */
class SpellController extends AbstractActionController {
    
    protected $spellTable;
    
    public function indexAction()
    {
        return new ViewModel(array(
            'spells' => $this->getSpellTable()->fetchAll(),
        ));
    }
    
    public function viewAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        return new ViewModel(array(
            'id' => $id,
            'spell' => $this->getSpellTable()->getSpell($id),
        ));        
    }
    
    
    public function editAction()
    {
        $form = new SpellForm();
        $resultMsg = '';

        $request = $this->getRequest();
        if ($request->isPost()) {       
            $spell = new Spell();
            $form->setInputFilter($spell->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                var_dump($form->getData());
                $spell->exchangeArray($form->getData());
                $this->getSpellTable()->saveSpell($spell);
                
                return $this->redirect()->toRoute('spell');
            }
            
        } else {
            $id = (int)$this->params()->fromRoute('id', 0); 
            
            try {
                $spell = $this->getSpellTable()->getSpell($id);
                $form->bind($spell);
            } catch (\Exception $ex) {
            }
        }

        return new ViewModel(array(
            'id' => $id,
            'form' => $form,
            'resultMsg' => $resultMsg,
        ));        
    }
    
    public function copyAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        $this->getSpellTable()->copySpell($id);
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;        
    }
    
    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        $this->getSpellTable()->deleteSpell($id);
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }   
    
    public function getSpellTable()
    {
        if (!$this->spellTable) {
            $sm = $this->getServiceLocator();
            $this->spellTable = $sm->get('\Spell\Model\SpellTable');
        }
        return $this->spellTable;
    }
}

?>
