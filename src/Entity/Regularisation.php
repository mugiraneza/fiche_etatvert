<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegularisationRepository")
 */
class Regularisation
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
    private $postecode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poste_etat_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sousdossier", inversedBy="yes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousdossier;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPosteEtatCode(): ?string
    {
        return $this->poste_etat_code;
    }

    public function setPosteEtatCode(string $poste_etat_code): self
    {
        $this->poste_etat_code = $poste_etat_code;

        return $this;
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
