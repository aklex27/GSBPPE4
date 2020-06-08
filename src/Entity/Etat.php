<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatRepository")
 */
class Etat
{
    /* @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     **/
    private $libelle;

    /* @ORM\ManyToMany(targetEntity="App\Entity\FicheFrais")
     */
    private $FicheFrais;

    public function __construct()
    {
        $this->FicheFrais = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|FicheFrais[]
     */
    public function getFicheFrais(): Collection
    {
        return $this->FicheFrais;
    }

    public function addFicheFrai(FicheFrais $ficheFrai): self
    {
        if (!$this->FicheFrais->contains($ficheFrai)) {
            $this->FicheFrais[] = $ficheFrai;
        }

        return $this;
    }

    public function removeFicheFrai(FicheFrais $ficheFrai): self
    {
        if ($this->FicheFrais->contains($ficheFrai)) {
            $this->FicheFrais->removeElement($ficheFrai);
        }

        return $this;
    }
}