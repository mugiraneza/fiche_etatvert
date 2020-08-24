<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 */
class Entreprise
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
    private $libelle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationdate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rccm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomdirecteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomcreateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomresponsablecomptable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisateur", mappedBy="entreprise")
     */
    private $utilisateurs;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
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

    public function getCreationdate(): ?\DateTimeInterface
    {
        return $this->creationdate;
    }

    public function setCreationdate(\DateTimeInterface $creationdate): self
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    public function getRccm(): ?string
    {
        return $this->rccm;
    }

    public function setRccm(string $rccm): self
    {
        $this->rccm = $rccm;

        return $this;
    }

    public function getNomdirecteur(): ?string
    {
        return $this->nomdirecteur;
    }

    public function setNomdirecteur(string $nomdirecteur): self
    {
        $this->nomdirecteur = $nomdirecteur;

        return $this;
    }

    public function getNomcreateur(): ?string
    {
        return $this->nomcreateur;
    }

    public function setNomcreateur(string $nomcreateur): self
    {
        $this->nomcreateur = $nomcreateur;

        return $this;
    }

    public function getNomresponsablecomptable(): ?string
    {
        return $this->nomresponsablecomptable;
    }

    public function setNomresponsablecomptable(string $nomresponsablecomptable): self
    {
        $this->nomresponsablecomptable = $nomresponsablecomptable;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }
    public function __toString()
    {
        return $this->libelle." (".$this->nomdirecteur.")";
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setEntreprise($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            // set the owning side to null (unless already changed)
            if ($utilisateur->getEntreprise() === $this) {
                $utilisateur->setEntreprise(null);
            }
        }

        return $this;
    }
}
