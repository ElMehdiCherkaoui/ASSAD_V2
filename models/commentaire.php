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
    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __toString(): string
    {
        return "Commentaire (ID: {$this->commentaireId}, VisitGuideID: {$this->visitGuideCommentaireId}, UserID: {$this->utilisateurCommentaireId}, Note: {$this->note}, Text: {$this->texte}, Date: {$this->dateCommentaire})";
    }
}
