<?php
class EtapVisits
{
    private $idEtapVisit;
    private $titleEtap;
    private $descriptionEtap;
    private $orderEtap;
    private $visitGuideEtapId;

    public function __construct(
        $idEtapVisit = null,
        $titleEtap = null,
        $descriptionEtap = null,
        $orderEtap = null,
        $visitGuideEtapId = null
    ) {
        $this->idEtapVisit = $idEtapVisit;
        $this->titleEtap = $titleEtap;
        $this->descriptionEtap = $descriptionEtap;
        $this->orderEtap = $orderEtap;
        $this->visitGuideEtapId = $visitGuideEtapId;
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
        return "EtapVisits (ID: {$this->idEtapVisit}, Title: {$this->titleEtap}, Description: {$this->descriptionEtap}, Order: {$this->orderEtap}, VisitGuideID: {$this->visitGuideEtapId})";
    }
    public function ajouterEtape(): bool
    {
        $db = (new Database())->getConnection();

        $sql = "INSERT INTO etapesvisite (guid_tour_id, step_order, step_title, step_description)
            VALUES (:id_visit, :step_order, :step_title, :step_description)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_visit', $this->id_visite);
        $stmt->bindParam(':step_order', $this->ordreEtape);
        $stmt->bindParam(':step_title', $this->titreEtape);
        $stmt->bindParam(':step_description', $this->descriptionEtape);

        return $stmt->execute();
    }
    public function listEtaps($id_visite): array
    {
        $db = (new Database())->getConnection();

        $sql = "SELECT * FROM etapesvisite WHERE guid_tour_id = :id_visit ORDER BY step_order";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_visit', $id_visite);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}