<?php
class Reservation
{
    private $idReservation;
    private $guideVisitReservationId;
    private $utilisateurReservationId;
    private $nbPersonnes;
    private $dateReservation;

    public function __construct(
        $idReservation = null,
        $guideVisitReservationId = null,
        $utilisateurReservationId = null,
        $nbPersonnes = null,
        $dateReservation = null
    ) {
        $this->idReservation = $idReservation;
        $this->guideVisitReservationId = $guideVisitReservationId;
        $this->utilisateurReservationId = $utilisateurReservationId;
        $this->nbPersonnes = $nbPersonnes;
        $this->dateReservation = $dateReservation;
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
        return "Reservation (ID: {$this->idReservation}, GuideVisitID: {$this->guideVisitReservationId}, UserID: {$this->utilisateurReservationId}, Persons: {$this->nbPersonnes}, Date: {$this->dateReservation})";
    }
    public function listReservationGuidePage(int $guideId)
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "
        SELECT *
        FROM userReservations r
        left JOIN visitesGuidees g
            ON r.tour_id_reservation_fk = g.guided_id
        left JOIN users u
            ON r.user_id_reservation_fk = u.Users_id
        WHERE g.user_guide_id = :guideId
    ";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':guideId', $guideId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addReservation($tourId, $userId, $numberOfPeople)
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "INSERT INTO userReservations 
                (tour_id_reservation_fk, user_id_reservation_fk, number_of_people, reservation_date)
                VALUES (:tourId, :userId, :numPeople, NOW())";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":tourId", $tourId);
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":numPeople", $numberOfPeople);

        return $stmt->execute();
    }
public function listReservationVisitPage(int $userId)
{
    $database = new Database();
    $db = $database->getConnection();

    $sql = "
        SELECT r.reservation_id, r.number_of_people, r.reservation_date,
               g.guided_id,g.title, g.date_time, g.duree, g.languages
        FROM userReservations r
        left JOIN visitesGuidees g
            ON r.tour_id_reservation_fk = g.guided_id
        WHERE r.user_id_reservation_fk = :userId
    ";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function countReservations() {
    $db = (new Database())->getConnection();
    $stmt = $db->prepare("SELECT COUNT(*) as total FROM userReservations");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

}