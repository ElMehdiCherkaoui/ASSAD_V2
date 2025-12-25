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

    public function getIdEtapVisit()
    {
        return $this->idEtapVisit;
    }

    public function getTitleEtap()
    {
        return $this->titleEtap;
    }

    public function setTitleEtap($titleEtap)
    {
        $this->titleEtap = $titleEtap;
    }

    public function getDescriptionEtap()
    {
        return $this->descriptionEtap;
    }

    public function setDescriptionEtap($descriptionEtap)
    {
        $this->descriptionEtap = $descriptionEtap;
    }

    public function getOrderEtap()
    {
        return $this->orderEtap;
    }

    public function setOrderEtap($orderEtap)
    {
        $this->orderEtap = $orderEtap;
    }

    public function getVisitGuideEtapId()
    {
        return $this->visitGuideEtapId;
    }

    public function setVisitGuideEtapId($visitGuideEtapId)
    {
        $this->visitGuideEtapId = $visitGuideEtapId;
    }
    public function __toString()
{
    return "EtapVisits (ID: {$this->idEtapVisit}, Title: {$this->titleEtap}, Description: {$this->descriptionEtap}, Order: {$this->orderEtap}, VisitGuideID: {$this->visitGuideEtapId})";
}

}