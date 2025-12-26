<?php
class Reservation
{
    private $idReservation;
    private $guideVisitReservationId;
    private $utilisateurReservationId;
    private $nbPersonnes;
    private $dateReservation;

    public function __construct(
        $idReservation,
        $guideVisitReservationId,
        $utilisateurReservationId,
        $nbPersonnes,
        $dateReservation
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
}
