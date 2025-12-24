<?php
class Animal
{
    private $idAni;
    private $name;
    private $espece;
    private $alimentation;
    private $image;
    private $paysOrigine;
    private $descriptionCourte;
    private $id_habitat;

    public function __construct(
        $idAni,
        $name,
        $espece,
        $alimentation,
        $image,
        $paysOrigine,
        $descriptionCourte,
        $id_habitat
    ) {
        $this->idAni = $idAni;
        $this->name = $name;
        $this->espece = $espece;
        $this->alimentation = $alimentation;
        $this->image = $image;
        $this->paysOrigine = $paysOrigine;
        $this->descriptionCourte = $descriptionCourte;
        $this->id_habitat = $id_habitat;
    }

    public function getIdAni()
    {
        return $this->idAni;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEspece()
    {
        return $this->espece;
    }

    public function setEspece($espece)
    {
        $this->espece = $espece;
    }

    public function getAlimentation()
    {
        return $this->alimentation;
    }

    public function setAlimentation($alimentation)
    {
        $this->alimentation = $alimentation;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getPaysOrigine()
    {
        return $this->paysOrigine;
    }

    public function setPaysOrigine($paysOrigine)
    {
        $this->paysOrigine = $paysOrigine;
    }

    public function getDescriptionCourte()
    {
        return $this->descriptionCourte;
    }

    public function setDescriptionCourte($descriptionCourte)
    {
        $this->descriptionCourte = $descriptionCourte;
    }

    public function getIdHabitat()
    {
        return $this->id_habitat;
    }

    public function setIdHabitat($id_habitat)
    {
        $this->id_habitat = $id_habitat;
    }
}