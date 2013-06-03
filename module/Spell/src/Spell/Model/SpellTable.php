<?php
namespace Spell\Model;

use Zend\Db\TableGateway\TableGateway;

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
        $resultSet = $this->tableGateway->select();
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
}

?>
