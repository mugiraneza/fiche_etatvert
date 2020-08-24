<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PosteRepository")
 */
class Poste
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
    private $etat_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valeur_default;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $font;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $referencesage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtatCode(): ?string
    {
        return $this->etat_code;
    }

    public function setEtatCode(string $etat_code): self
    {
        $this->etat_code = $etat_code;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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

    public function getValeurDefault(): ?string
    {
        return $this->valeur_default;
    }

    public function setValeurDefault(string $valeur_default): self
    {
        $this->valeur_default = $valeur_default;

        return $this;
    }

    public function getFont(): ?string
    {
        return $this->font;
    }

    public function setFont(string $font): self
    {
        $this->font = $font;

        return $this;
    }

    public function getReferencesage(): ?string
    {
        return $this->referencesage;
    }

    public function setReferencesage(string $referencesage): self
    {
        $this->referencesage = $referencesage;

        return $this;
    }
}
