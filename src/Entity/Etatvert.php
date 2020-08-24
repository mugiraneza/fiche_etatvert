<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatvertRepository")
 */
class Etatvert
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poste;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postecode;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sousdossier", inversedBy="etatverts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousdossier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getPostecode(): ?string
    {
        return $this->postecode;
    }

    public function setPostecode(string $postecode): self
    {
        $this->postecode = $postecode;

        return $this;
    }

    public function getSousdossier(): ?sousdossier
    {
        return $this->sousdossier;
    }

    public function setSousdossier(?sousdossier $sousdossier): self
    {
        $this->sousdossier = $sousdossier;

        return $this;
    }
}
