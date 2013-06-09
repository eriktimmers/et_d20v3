<?php
namespace D20\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


/**
 * Description of Gamesystem
 *
 * @author erik
 */
class Gamesystem implements InputFilterAwareInterface
{
    public $id;
    public $name;
    protected $inputFilter;
    
    public function exchangeArray($data)
    {
        $this->id               = (!empty($data['id']) ? $data['id'] : null);
        $this->name             = (!empty($data['name']) ? $data['name'] : null);
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
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }
    
}
