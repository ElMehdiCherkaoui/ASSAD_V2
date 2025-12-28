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
        $commentaireId = null,
        $visitGuideCommentaireId = null,
        $utilisateurCommentaireId = null,
        $note = null,
        $texte = null,
        $dateCommentaire = null
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
    public function addComment($tourId, $userId, $comment, $rating)
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "INSERT INTO userComments (tours_id_comment_fk, user_id_comment_fk, rating, text_desc)
            VALUES (:tour_id, :user_id, :rating, :comment)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tour_id', $tourId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':comment', $comment);

        return $stmt->execute();
    }
}
