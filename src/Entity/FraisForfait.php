<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FraisForfaitRepository")
 */
class FraisForfait
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Libelle;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $Montant;

    public function getId()
    {
        return $this->id;
    }

    public function getLibelle()
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    public function getMontant()
    {
        return $this->Montant;
    }

    public function setMontant(string $Montant)
    {
        $this->Montant = $Montant;

        return $this;
    }
}
