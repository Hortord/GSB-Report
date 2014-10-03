<?php

namespace GSB\DAO;

use GSB\Domain\Practitioner;

class PractitionerDAO extends DAO
{
    private $practitioner_typeDAO;
    public function setPractitioner_typeDAO($practitioner_typeDAO) {
        $this->practitioner_typeDAO = $practitioner_typeDAO;
    }
    public function findAll() {
        $sql = "select * from practitioner order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $practitioners = array();
        foreach ($result as $row) {
            $practitioner_id = $row['$practitioner_id'];
            $practitioners[$practitioner_id] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }
    public function findAllByType($practitioner_id) {
        $sql = "select * from practitioner where practitioner_id=? order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql, array($practitioner_id));
        
        // Convert query result to an array of domain objects
        $practitioners = array();
        foreach ($result as $row) {
            $practitioner_id = $row['$practitioner_id'];
            $practitioners[$practitioner_id] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }
    public function find($id) {
        $sql = "select * from practitioner where practitioner_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No practitioner found for id " . $id);
    }
    protected function buildDomainObject($row) {
        $practitioner_id = $row['practitioner_id'];
        $type = $this->practitioner_typeDAO->find($type_Id);

        $practitioner = new Drug();
        $practitioner->setId($row['practitioner_id']);
        $practitioner->setType($type);
        $practitioner->setName($row['practitioner_name']);
        $practitioner->setFirst_name($row['practitioner_first_name']);
        $practitioner->setAddress($row['practitioner_address']);
        $practitioner->setZip_code($row['practitioner_zip_code']);
        $practitioner->setCity($row['practitioner_city']);
        $practitioner->setCoefficient($row['notoriety_coefficient']);
        return $practitioner;
    }
    
}

