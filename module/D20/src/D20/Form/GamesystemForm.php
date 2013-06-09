<?php
namespace D20\Form;

use Zend\Form\Form;

/**
 * Description of Form
 *
 * @author erik
 */
class GamesystemForm extends Form
{
    public function __construct($name= null)
    {
        parent::__construct('spell');
        
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'Text',
            ),
            'options' => array(
                'label' => 'Name',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'Submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
        
    }
}