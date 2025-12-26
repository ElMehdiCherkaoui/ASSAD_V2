<?php
class Animal
{
    private $idAni;
    private $name;
    private $espece;
    private $alimentation;
    private $image;
    private $paysOrigine;
    private $descriptionCourte;
    private $id_habitat;


    public function __construct($idAni = null, $name = null, $espece = null, $alimentation = null, $image = null, $paysOrigine = null, $descriptionCourte = null, $id_habitat = null)
    {
        $this->idAni = $idAni;
        $this->name = $name;
        $this->espece = $espece;
        $this->alimentation = $alimentation;
        $this->image = $image;
        $this->paysOrigine = $paysOrigine;
        $this->descriptionCourte = $descriptionCourte;
        $this->id_habitat = $id_habitat;
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
        return "Animal (ID: {$this->idAni}, Name: {$this->name}, Espece: {$this->espece}, Alimentation: {$this->alimentation}, Image: {$this->image}, PaysOrigine: {$this->paysOrigine}, Description: {$this->descriptionCourte}, HabitatID: {$this->id_habitat})";
    }


    public function findAll()
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT 
                   *
                FROM Animal a
                LEFT JOIN Habitats h ON a.Habitat_ID = h.Hab_id";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function createAnimal()
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "INSERT INTO Animal 
                (animalName, espece, alimentation, image, paysOrigine, descriptionCourte, Habitat_ID)
                VALUES (:animal, :espece, :alimentation, :image, :paysorigine, :descriptioncourte, :habitat_id)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":animal", $this->name);
        $stmt->bindParam(":espece", $this->espece);
        $stmt->bindParam(":alimentation", $this->alimentation);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":paysorigine", $this->paysOrigine);
        $stmt->bindParam(":descriptioncourte", $this->descriptionCourte);
        $stmt->bindParam(":habitat_id", $this->id_habitat);

        return $stmt->execute();
    }

    public function updateAnimal()
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "UPDATE Animal SET
        animalName = :animal,
        espece = :espece,
        alimentation = :alimentation,
        Image = :image,
        paysOrigine = :paysorigine,
        descriptionCourte = :descriptioncourte,
        Habitat_ID = :habitat_id
        WHERE Ani_id = :idAni";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":animal", $this->name);
        $stmt->bindParam(":espece", $this->espece);
        $stmt->bindParam(":alimentation", $this->alimentation);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":paysorigine", $this->paysOrigine);
        $stmt->bindParam(":descriptioncourte", $this->descriptionCourte);
        $stmt->bindParam(":habitat_id", $this->id_habitat);
        $stmt->bindParam(":idAni", $this->idAni);

        return $stmt->execute();
    }

    public function deleteAnimal($idAnii)
    {
        $database = new Database();
        $db = $database->getConnection();
        $sql = "DELETE FROM Animal WHERE Ani_id = :idAni";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":idAni", $idAnii);
        return $stmt->execute();
    }
    public function findByHabitat($habitatId) {}
    public function findByCountry($country) {}
}
