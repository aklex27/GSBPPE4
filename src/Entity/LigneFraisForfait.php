<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneFraisForfaitRepository")
 */
class LigneFraisForfait
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
     * @ORM\Column(type="string", length=30)
     */
    private $mois;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\FraisForfait", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $fraisForfait;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

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

    public function getFraisForfait()
    {
        return $this->fraisForfait;
    }

    public function setFraisForfait(FraisForfait $fraisForfait)
    {
        $this->fraisForfait = $fraisForfait;

        return $this;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }
}
