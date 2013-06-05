<?php

namespace Spell\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
