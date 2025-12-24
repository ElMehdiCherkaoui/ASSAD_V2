<?php
class Commentaire
{
    private $commentaireId;
    private $visitGuideCommentaireId;
    private $utilisateurCommentaireId;
    private $note;
    private $texte;
    private $dateCommentaire;

    public function __construct(
        $commentaireId,
        $visitGuideCommentaireId,
        $utilisateurCommentaireId,
        $note,
        $texte,
        $dateCommentaire
    ) {
        $this->commentaireId = $commentaireId;
        $this->visitGuideCommentaireId = $visitGuideCommentaireId;
        $this->utilisateurCommentaireId = $utilisateurCommentaireId;
        $this->note = $note;
        $this->texte = $texte;
        $this->dateCommentaire = $dateCommentaire;
    }

    public function getCommentaireId()
    {
        return $this->commentaireId;
    }

    public function getVisitGuideCommentaireId()
    {
        return $this->visitGuideCommentaireId;
    }

    public function setVisitGuideCommentaireId($visitGuideCommentaireId)
    {
        $this->visitGuideCommentaireId = $visitGuideCommentaireId;
    }

    public function getUtilisateurCommentaireId()
    {
        return $this->utilisateurCommentaireId;
    }

    public function setUtilisateurCommentaireId($utilisateurCommentaireId)
    {
        $this->utilisateurCommentaireId = $utilisateurCommentaireId;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;
    }

    public function getTexte()
    {
        return $this->texte;
    }

    public function setTexte($texte)
    {
        $this->texte = $texte;
    }

    public function getDateCommentaire()
    {
        return $this->dateCommentaire;
    }

    public function setDateCommentaire($dateCommentaire)
    {
        $this->dateCommentaire = $dateCommentaire;
    }
}
