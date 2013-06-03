<?php
namespace Spell\Model;

/**
 * Description of Spell
 *
 * @author erik
 */
class Spell 
{
    public $id;
    public $name;
    public $shortdescription;
    public $longdescription;
    
    public function exchangeArray($data)
    {
        $this->id               = (!empty($data['spl_id']) ? $data['spl_id'] : null);
        $this->name             = (!empty($data['spl_name']) ? $data['spl_name'] : null);
        $this->shortdescription = (!empty($data['spl_shortdescription']) ? $data['spl_shortdescription'] : null);
        $this->longdescription  = (!empty($data['spl_longdescription']) ? $data['spl_longdescription'] : null);
    }
    
}
