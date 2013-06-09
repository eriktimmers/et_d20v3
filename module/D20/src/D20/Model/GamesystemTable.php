<?php
namespace D20\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

/**
 * Description of GamesystemTable
 *
 * @author erik
 */
class GamesystemTable 
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
            $select->order('id ASC')->limit(200);
        });
        return $resultSet;
    }
    
    public function getGamesystem($id)
    {
        $resultSet = $this->tableGateway->select(array('id' => (int)$id));
        $row = $resultSet->current();
        if (!$row) {
            throw new \Exception("Could not find gamesystem " . (int)$id);
        }
        return $row;
    }
    
    public function saveGamesystem(Gamesystem $gamesystem)
    {
        $data = $this->objectToDataArray($gamesystem);
        
        $id = (int)$gamesystem->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getGamesystem($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception("Form id does not exist");
            }
        }     
    }
    
    public function deleteGamesystem($id)
    {
        $this->tableGateway->delete(array('id' => (int)$id));
    }
    
    protected function objectToDataArray($spell)
    {
        $data = array(
            'name' => $spell->name,        
            );

        return $data;
    }
}

?>
