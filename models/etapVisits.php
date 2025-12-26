<?php
class EtapVisits
{
    private $idEtapVisit;
    private $titleEtap;
    private $descriptionEtap;
    private $orderEtap;
    private $visitGuideEtapId;

    public function __construct(
        $idEtapVisit,
        $titleEtap,
        $descriptionEtap,
        $orderEtap,
        $visitGuideEtapId
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
    public function ajouterEtape() {}
}
