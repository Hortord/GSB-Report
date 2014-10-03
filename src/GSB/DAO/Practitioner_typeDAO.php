<?php

namespace GSB\DAO;

use GSB\Domain\Practitioner_typeDAO;

class Practitioner_typeDAO extends DAO
{
    
    public function findAll() {
        $sql = "select * from practitioner_type order by practitioner_type_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $Practitioner_types = array();
        foreach ($result as $row) {
            $type_Id = $row['practitioner_type_id'];
            $Practitioner_types[$type_Id] = $this->buildDomainObject($row);
        }
        return $Practitioner_types;
    }

    /**
     * Returns the family matching the given id.
     *
     * @param integer $id The family id.
     *
     * @return \GSB\Domain\Family|throws an exception if no family is found.
     */
    public function find($id) {
        $sql = "select * from practitioner_type where practitioner_type_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No practitioner type found for id " . $id);
    }

    
    protected function buildDomainObject($row) {
        $type = new Practitioner_type();
        $type->setId($row['practitioner_type_id']);
        $type->setCode($row['practitioner_type_code']);
        $type->setName($row['practitioner_type_name']);
        $type->setPlace($row['practitioner_type_place']);
        return $type; 
    }
}