<?php
namespace Spell\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


/**
 * Description of Spell
 *
 * @author erik
 */
class Spell implements InputFilterAwareInterface
{
    public $id;
    public $name;
    public $castingtime;
    public $range;
    public $effecttype;
    public $effect;
    public $duration;
    public $savingthrow;
    public $spellresistance;
    public $components;
    public $material;
    public $shortdescription;
    public $mediumdescription;
    public $longdescription;
    protected $inputFilter;
    
    public function exchangeArray($data)
    {
        $this->id               = (!empty($data['id']) ? $data['id'] : null);
        $this->name             = (!empty($data['name']) ? $data['name'] : null);
        $this->castingtime      = (!empty($data['castingtime']) ? $data['castingtime'] : null);
        $this->range            = (!empty($data['range']) ? $data['range'] : null);
        $this->effecttype       = (!empty($data['effecttype']) ? $data['effecttype'] : null);
        $this->effect           = (!empty($data['effect']) ? $data['effect'] : null);
        $this->duration         = (!empty($data['duration']) ? $data['duration'] : null);
        $this->savingthrow      = (!empty($data['savingthrow']) ? $data['savingthrow'] : null);
        $this->spellresistance  = (!empty($data['spellresistance']) ? $data['spellresistance'] : null);
        $this->components       = (!empty($data['components']) ? $data['components'] : null);
        $this->material         = (!empty($data['material']) ? $data['material'] : null);
        $this->shortdescription = (!empty($data['shortdescription']) ? $data['shortdescription'] : null);
        $this->mediumdescription = (!empty($data['mediumdescription']) ? $data['mediumdescription'] : null);
        $this->longdescription  = (!empty($data['longdescription']) ? $data['longdescription'] : null);
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("not used");
    }

    
    public function getInputFilter()
    {
        $defFilters = array(
                          array('name' => 'StripTags'),
                          array('name' => 'StringTrim'),
                      );
        
        $defValidators = array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 32,
                                ),
                            ),
                        );
        
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'id',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'name',
                'required' => true,
                'filters' => $defFilters,
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 100,
                        ),
                    ),
                ),
            )));         
  
            $inputFilter->add($factory->createInput(array(
                'name' => 'castingtime',
                'required' => true,
                'filters' => $defFilters,
                'validators' => $defValidators,
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'range',
                'required' => true,
                'filters' => $defFilters,
                'validators' => $defValidators,
            )));
              
            $inputFilter->add($factory->createInput(array(
                'name' => 'effecttype',
                'required' => true,
                'filters' => $defFilters,
                'validators' => $defValidators,
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'effect',
                'required' => true,
                'filters' => $defFilters,
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 128,
                        ),
                    ),
                ),
            )));            

            $inputFilter->add($factory->createInput(array(
                'name' => 'duration',
                'required' => true,
                'filters' => $defFilters,
                'validators' => $defValidators,
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'savingthrow',
                'required' => false,
                'filters' => $defFilters,
                'validators' => $defValidators,
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'spellresistance',
                'required' => false,
                'filters' => $defFilters,
                'validators' => $defValidators,
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'components',
                'required' => true,
                'filters' => $defFilters,
                'validators' => $defValidators,
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'material',
                'required' => false,
                'filters' => $defFilters,
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 100,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'shortdescription',
                'required' => true,
                'filters' => $defFilters,
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 500,
                        ),
                    ),
                ),
            )));  

            $inputFilter->add($factory->createInput(array(
                'name' => 'mediumdescription',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'longdescription',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                ),
            )));
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }
    
}
