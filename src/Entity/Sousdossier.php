<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SousdossierRepository")
 */
class Sousdossier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $date_traitement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\personnel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personnel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Regularisation", mappedBy="sousdossier", orphanRemoval=true)
     */
    private $yes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Etatvert", mappedBy="sousdossier")
     */
    private $etatverts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Etat", mappedBy="liensousdossier")
     */
    private $etats;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Base", mappedBy="sousdossier", orphanRemoval=true)
     */
    private $bases;

    public function __construct()
    {
        $this->yes = new ArrayCollection();
        $this->etatverts = new ArrayCollection();
        $this->etats = new ArrayCollection();
        $this->bases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTraitement(): ?string
    {
        return $this->date_traitement;
    }

    public function setDateTraitement(string $date_traitement): self
    {
        $this->date_traitement = $date_traitement;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getPersonnel(): ?Personnel
    {
        return $this->personnel;
    }

    public function setPersonnel(?Personnel $personnel): self
    {
        $this->personnel = $personnel;

        return $this;
    }

    /**
     * @return Collection|Regularisation[]
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(Regularisation $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setSousdossier($this);
        }

        return $this;
    }

    public function removeYe(Regularisation $ye): self
    {
        if ($this->yes->contains($ye)) {
            $this->yes->removeElement($ye);
            // set the owning side to null (unless already changed)
            if ($ye->getSousdossier() === $this) {
                $ye->setSousdossier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Etatvert[]
     */
    public function getEtatverts(): Collection
    {
        return $this->etatverts;
    }

    public function addEtatvert(Etatvert $etatvert): self
    {
        if (!$this->etatverts->contains($etatvert)) {
            $this->etatverts[] = $etatvert;
            $etatvert->setSousdossier($this);
        }

        return $this;
    }

    public function removeEtatvert(Etatvert $etatvert): self
    {
        if ($this->etatverts->contains($etatvert)) {
            $this->etatverts->removeElement($etatvert);
            // set the owning side to null (unless already changed)
            if ($etatvert->getSousdossier() === $this) {
                $etatvert->setSousdossier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Etat[]
     */
    public function getEtats(): Collection
    {
        return $this->etats;
    }

    public function addEtat(Etat $etat): self
    {
        if (!$this->etats->contains($etat)) {
            $this->etats[] = $etat;
            $etat->setLiensousdossier($this);
        }

        return $this;
    }

    public function removeEtat(Etat $etat): self
    {
        if ($this->etats->contains($etat)) {
            $this->etats->removeElement($etat);
            // set the owning side to null (unless already changed)
            if ($etat->getLiensousdossier() === $this) {
                $etat->setLiensousdossier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Base[]
     */
    public function getBases(): Collection
    {
        return $this->bases;
    }

    public function addBasis(Base $basis): self
    {
        if (!$this->bases->contains($basis)) {
            $this->bases[] = $basis;
            $basis->setSousdossier($this);
        }

        return $this;
    }

    public function removeBasis(Base $basis): self
    {
        if ($this->bases->contains($basis)) {
            $this->bases->removeElement($basis);
            // set the owning side to null (unless already changed)
            if ($basis->getSousdossier() === $this) {
                $basis->setSousdossier(null);
            }
        }

        return $this;
    }
}
