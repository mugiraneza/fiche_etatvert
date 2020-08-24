<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DossierRepository")
 */
class Dossier
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
    private $annee;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datedernierchargement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PERSONNEL;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnel", mappedBy="dossier", orphanRemoval=true)
     */
    private $personnels;

    public function __construct()
    {
        $this->personnels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getDatedernierchargement(): ?\DateTimeInterface
    {
        return $this->datedernierchargement;
    }

    public function setDatedernierchargement(\DateTimeInterface $datedernierchargement): self
    {
        $this->datedernierchargement = $datedernierchargement;

        return $this;
    }

    public function getEntreprise(): ?entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getPERSONNEL(): ?string
    {
        return $this->PERSONNEL;
    }

    public function setPERSONNEL(string $PERSONNEL): self
    {
        $this->PERSONNEL = $PERSONNEL;

        return $this;
    }

    /**
     * @return Collection|Personnel[]
     */
    public function getPersonnels(): Collection
    {
        return $this->personnels;
    }

    public function addPersonnel(Personnel $personnel): self
    {
        if (!$this->personnels->contains($personnel)) {
            $this->personnels[] = $personnel;
            $personnel->setDossier($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->id." ( ".$this->annee." )";
    }
    public function removePersonnel(Personnel $personnel): self
    {
        if ($this->personnels->contains($personnel)) {
            $this->personnels->removeElement($personnel);
            // set the owning side to null (unless already changed)
            if ($personnel->getDossier() === $this) {
                $personnel->setDossier(null);
            }
        }

        return $this;
    }
}
