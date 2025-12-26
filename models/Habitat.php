<?php
class Habitat
{
    private $idHab;
    private $name;
    private $typeClimat;
    private $description;
    private $zoneZoo;
    public function __construct($idHab = null, $name = null, $typeClimat = null, $description = null, $zoneZoo = null)
    {
        $this->idHab = $idHab;
        $this->name = $name;
        $this->typeClimat = $typeClimat;
        $this->description = $description;
        $this->zoneZoo = $zoneZoo;
    }

    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __toString()
    {
        return "Habitat (ID: {$this->idHab}, Name: {$this->name}, Climate: {$this->typeClimat}, Zone: {$this->zoneZoo}, Description: {$this->description})";
    }
    public function findAll()
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT * FROM Habitats";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function createHabitat()
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "INSERT INTO habitats 
        (habitatsName, descriptionHab, typeClimat, zoo_zone)
        VALUES 
        (:habitatsName, :descriptionHab, :typeClimat, :zoo_zone)";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':habitatsName', $this->name);
        $stmt->bindParam(':descriptionHab', $this->description);
        $stmt->bindParam(':typeClimat', $this->typeClimat);
        $stmt->bindParam(':zoo_zone', $this->zoneZoo);

        return $stmt->execute();
    }

    public function updateHabitat($setidhab)
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "UPDATE habitats SET
        habitatsName = :habitatsName,
        descriptionHab = :descriptionHab,
        typeClimat = :typeClimat,
        zoo_zone = :zoo_zone
    WHERE Hab_id = :Hab_id";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':habitatsName', $this->name);
        $stmt->bindParam(':descriptionHab', $this->description);
        $stmt->bindParam(':typeClimat', $this->typeClimat);
        $stmt->bindParam(':zoo_zone', $this->zoneZoo);
        $stmt->bindParam(':Hab_id', $setidhab);

        return $stmt->execute();
    }

    public function deleteHabitat($Hab_id)
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "DELETE FROM habitats WHERE Hab_id = :Hab_id";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':Hab_id', $Hab_id);

        return $stmt->execute();
    }
}
