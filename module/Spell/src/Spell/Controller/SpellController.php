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
