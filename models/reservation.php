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

    public function getIdReservation()
    {
        return $this->idReservation;
    }

    public function getGuideVisitReservationId()
    {
        return $this->guideVisitReservationId;
    }

    public function setGuideVisitReservationId($guideVisitReservationId)
    {
        $this->guideVisitReservationId = $guideVisitReservationId;
    }

    public function getUtilisateurReservationId()
    {
        return $this->utilisateurReservationId;
    }

    public function setUtilisateurReservationId($utilisateurReservationId)
    {
        $this->utilisateurReservationId = $utilisateurReservationId;
    }

    public function getNbPersonnes()
    {
        return $this->nbPersonnes;
    }

    public function setNbPersonnes($nbPersonnes)
    {
        $this->nbPersonnes = $nbPersonnes;
    }

    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;
    }

        public function __toString()
    {
        return "Reservation (ID: {$this->idReservation}, GuideVisitID: {$this->guideVisitReservationId}, UserID: {$this->utilisateurReservationId}, Persons: {$this->nbPersonnes}, Date: {$this->dateReservation})";
    }
}