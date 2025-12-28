<?php
class VisiteGuidee
{
    private $idVisitGuide;
    private $titleVisit;
    private $dateHeureGuide;
    private $languageGuide;
    private $capacityMax;
    private $statusGuide;
    private $dureeGuide;
    private $userGuideId;

    public function __construct(
        $idVisitGuide = null,
        $titleVisit = null,
        $dateHeureGuide = null,
        $languageGuide = null,
        $capacityMax = null,
        $statusGuide = null,
        $dureeGuide = null,
        $userGuideId = null
    ) {
        $this->idVisitGuide = $idVisitGuide;
        $this->titleVisit = $titleVisit;
        $this->dateHeureGuide = $dateHeureGuide;
        $this->languageGuide = $languageGuide;
        $this->capacityMax = $capacityMax;
        $this->statusGuide = $statusGuide;
        $this->dureeGuide = $dureeGuide;
        $this->userGuideId = $userGuideId;
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
        return "VisiteGuidee (ID: {$this->idVisitGuide}, Title: {$this->titleVisit}, Date/Time: {$this->dateHeureGuide}, Language: {$this->languageGuide}, Capacity: {$this->capacityMax}, Status: {$this->statusGuide}, Duration: {$this->dureeGuide}, Guide User ID: {$this->userGuideId})";
    }
    public function findAll()
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT * FROM visitesGuidees";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($id)
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT * FROM visitesGuidees WHERE guided_id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function listGuideVisit(int $guideId): array
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT * FROM visitesGuidees WHERE user_guide_id = :guideId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':guideId', $guideId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function create(): bool
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "INSERT INTO visitesGuidees 
                (title, date_time, duree, languages, max_capacity, price, statut, user_guide_id)
                VALUES (:title, :date_time, :duree, :languages, :max_capacity, :price, :statut, :user_guide_id)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':date_time', $this->dateTime);
        $stmt->bindParam(':duree', $this->duration);
        $stmt->bindParam(':languages', $this->language);
        $stmt->bindParam(':max_capacity', $this->capacity);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':statut', $this->status);
        $stmt->bindParam(':user_guide_id', $this->idGuide);

        return $stmt->execute();
    }

    public function update(): bool
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "UPDATE visitesGuidees SET
                    title = :title,
                    date_time = :date_time,
                    duree = :duree,
                    languages = :languages,
                    max_capacity = :max_capacity,
                    price = :price
                WHERE guided_id = :idVisite";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':date_time', $this->dateTime);
        $stmt->bindParam(':duree', $this->duration);
        $stmt->bindParam(':languages', $this->language);
        $stmt->bindParam(':max_capacity', $this->capacity);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':idVisite', $this->idVisite);
        return $stmt->execute();
    }

    public function cancel($idVisite, $status): bool
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "UPDATE visitesGuidees SET statut = :status WHERE guided_id = :idVisite";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':idVisite', $idVisite);
        return $stmt->execute();
    }
    public function countTours() {
    $db = (new Database())->getConnection();
    $stmt = $db->prepare("SELECT COUNT(*) as total FROM visitesGuidees");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

}