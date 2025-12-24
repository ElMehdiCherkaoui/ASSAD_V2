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
    public function getIdHab()
    {
        return $this->idHab;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getTypeClimat()
    {
        return $this->typeClimat;
    }

    public function setTypeClimat($typeClimat)
    {
        $this->typeClimat = $typeClimat;
    }


    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function getZoneZoo()
    {
        return $this->zoneZoo;
    }

    public function setZoneZoo($zoneZoo)
    {
        $this->zoneZoo = $zoneZoo;
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
}
