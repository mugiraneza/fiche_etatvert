<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BaseRepository")
 */
class Base
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $postecode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $posteetatcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coeficient;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visible_coef;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sousdossier", inversedBy="bases")
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

    public function getPostecode(): ?string
    {
        return $this->postecode;
    }

    public function setPostecode(?string $postecode): self
    {
        $this->postecode = $postecode;

        return $this;
    }

    public function getPosteetatcode(): ?string
    {
        return $this->posteetatcode;
    }

    public function setPosteetatcode(?string $posteetatcode): self
    {
        $this->posteetatcode = $posteetatcode;

        return $this;
    }

    public function getCoeficient(): ?string
    {
        return $this->coeficient;
    }

    public function setCoeficient(string $coeficient): self
    {
        $this->coeficient = $coeficient;

        return $this;
    }

    public function getVisibleCoef(): ?bool
    {
        return $this->visible_coef;
    }

    public function setVisibleCoef(bool $visible_coef): self
    {
        $this->visible_coef = $visible_coef;

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
