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
        $idVisitGuide,
        $titleVisit,
        $dateHeureGuide,
        $languageGuide,
        $capacityMax,
        $statusGuide,
        $dureeGuide,
        $userGuideId
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

    public function getIdVisitGuide()
    {
        return $this->idVisitGuide;
    }

    public function getTitleVisit()
    {
        return $this->titleVisit;
    }

    public function setTitleVisit($titleVisit)
    {
        $this->titleVisit = $titleVisit;
    }

    public function getDateHeureGuide()
    {
        return $this->dateHeureGuide;
    }

    public function setDateHeureGuide($dateHeureGuide)
    {
        $this->dateHeureGuide = $dateHeureGuide;
    }

    public function getLanguageGuide()
    {
        return $this->languageGuide;
    }

    public function setLanguageGuide($languageGuide)
    {
        $this->languageGuide = $languageGuide;
    }

    public function getCapacityMax()
    {
        return $this->capacityMax;
    }

    public function setCapacityMax($capacityMax)
    {
        $this->capacityMax = $capacityMax;
    }

    public function getStatusGuide()
    {
        return $this->statusGuide;
    }

    public function setStatusGuide($statusGuide)
    {
        $this->statusGuide = $statusGuide;
    }

    public function getDureeGuide()
    {
        return $this->dureeGuide;
    }

    public function setDureeGuide($dureeGuide)
    {
        $this->dureeGuide = $dureeGuide;
    }

    public function getUserGuideId()
    {
        return $this->userGuideId;
    }

    public function setUserGuideId($userGuideId)
    {
        $this->userGuideId = $userGuideId;
    }
}