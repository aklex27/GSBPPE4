<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FicheFraisRepository")
 */
class FicheFrais
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Visiteur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $visiteur;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $mois;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbJustificatifs;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $montantValide;

    /**
     * @ORM\Column(type="date")
     */
    private $dateModif;

 

    public function getId()
    {
        return $this->id;
    }

    public function getVisiteur()
    {
        return $this->visiteur;
    }

    public function setVisiteur(Visiteur $visiteur)
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    public function getMois()
    {
        return $this->mois;
    }

    public function setMois(string $mois)
    {
        $this->mois = $mois;

        return $this;
    }

    public function getNbJustificatifs()
    {
        return $this->nbJustificatifs;
    }

    public function setNbJustificatifs(int $nbJustificatifs): self
    {
        $this->nbJustificatifs = $nbJustificatifs;

        return $this;
    }

    public function getMontantValide()
    {
        return $this->montantValide;
    }

    public function setMontantValide(string $montantValide): self
    {
        $this->montantValide = $montantValide;

        return $this;
    }

    public function getDateModif()
    {
        return $this->dateModif;
    }

    public function setDateModif(\DateTimeInterface $dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }


    
}
