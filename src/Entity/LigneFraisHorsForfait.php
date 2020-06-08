<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneFraisHorsForfaitRepository")
 */
class LigneFraisHorsForfait
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\FicheFrais", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $visiteur;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\FicheFrais", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $libelle;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $montant;

    public function getId()
    {
        return $this->id;
    }

    public function getVisiteur()
    {
        return $this->visiteur;
    }

    public function setVisiteur(FicheFrais $visiteur)
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate(DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }


    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant(string $montant)
    {
        $this->montant = $montant;

        return $this;
    }
}
