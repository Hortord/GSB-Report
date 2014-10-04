<?php

namespace GSB\DAO;

use GSB\Domain\Practitioner;

class PractitionerDAO extends DAO
{
    private $practitionerTypeDAO;
    public function setPractitionerTypeDAO($practitionerTypeDAO) {
        $this->practitionerTypeDAO = $practitionerTypeDAO;
    }
    public function findAll() {
        $sql = "select * from practitioner order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $practitioners = array();
        foreach ($result as $row) {
            $practitioner_id = $row['practitioner_id'];
            $practitioners[$practitioner_id] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }
    public function findAllByType($practitioner_id) {
        $sql = "select * from practitioner where practitioner_type_id=? order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql, array($practitioner_id));
        $practitioners = array();
        foreach ($result as $row) {
            $practitioner_id = $row['practitioner_id'];
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
        $practitionerTypeId = $row['practitioner_type_id'];
        $type = $this->practitionerTypeDAO->find($practitionerTypeId);

        $practitioner = new Practitioner();
        $practitioner->setId($row['practitioner_id']);
        $practitioner->setTypeID($type);
        $practitioner->setName($row['practitioner_name']);
        $practitioner->setFirst_name($row['practitioner_first_name']);
        $practitioner->setAddress($row['practitioner_address']);
        $practitioner->setZip_code($row['practitioner_zip_code']);
        $practitioner->setCity($row['practitioner_city']);
        $practitioner->setCoefficient($row['notoriety_coefficient']);
        return $practitioner;
    }
    
}

