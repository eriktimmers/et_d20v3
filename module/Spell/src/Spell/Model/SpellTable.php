<?php
namespace Spell\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

/**
 * Description of SpellTable
 *
 * @author erik
 */
class SpellTable 
{
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway) 
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select(function (Select $select) {
            //$select->where->like('name', 'Brit%');
            $select->order('name ASC')->limit(200);
        });
        return $resultSet;
    }
    
    public function getSpell($id)
    {
        $resultSet = $this->tableGateway->select(array('id' => (int)$id));
        $row = $resultSet->current();
        if (!$row) {
            throw new \Exception("Could not find spell " . (int)$id);
        }
        return $row;
    }
    
    public function saveSpell(Spell $spell)
    {
        $data = $this->objectToDataArray($spell);
        
        $id = (int)$spell->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getSpell($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception("Form id does not exist");
            }
        }     
    }
    
    public function deleteSpell($id)
    {
        $this->tableGateway->delete(array('id' => (int)$id));
    }
    
    public function copySpell($id)
    {
        $spell = $this->getSpell($id);
        $data = $this->objectToDataArray($spell);
        $this->tableGateway->insert($data);
    }
    
    protected function objectToDataArray($spell)
    {
        $data = array(
            'name'          => $spell->name,
            'castingtime'   => $spell->castingtime,
            'range'         => $spell->range,
            'effecttype'    => $spell->effecttype,
            'effect'        => $spell->effect,
            'duration'      => $spell->duration,
            'savingthrow'   => $spell->savingthrow,
            'spellresistance' => $spell->spellresistance,
            'components'    => $spell->components,
            'material'      => $spell->material,
            'shortdescription' => $spell->shortdescription,
            'mediumdescription' => $spell->mediumdescription,
            'longdescription'  => $spell->longdescription,            
        );

        return $data;
    }
}

?>
