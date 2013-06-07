<?php
namespace Spell\Form;

use Zend\Form\Form;

/**
 * Description of SpellForm
 *
 * @author erik
 */
class SpellForm extends Form
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
            'name' => 'castingtime',
            'attributes' => array(
                'type' => 'Text',
            ),
            'options' => array(
                'label' => 'Casting Time',
            ),
        ));        
        $this->add(array(
            'name' => 'range',
            'attributes' => array(
                'type' => 'Text',
            ),
            'options' => array(
                'label' => 'Range',
            ),
        ));        
        $this->add(array(
            'name' => 'effecttype',
            'attributes' => array(
                'type' => 'Text',
            ),
            'options' => array(
                'label' => 'Effecttype',
            ),
        ));
        
        $this->add(array(
            'name' => 'shortdescription',
            'attributes' => array(
                'type' => 'textarea',
            ),
            'options' => array(
                'label' => 'Short Description',
            ),
        ));
        $this->add(array(
            'name' => 'longdescription',
            'attributes' => array(
                'type' => 'textarea',
            ),
            'options' => array(
                'label' => 'Long Description',
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