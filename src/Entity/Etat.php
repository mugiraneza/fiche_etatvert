<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatRepository")
 */
class Etat
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
    private $salbas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $primanc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $primaut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $primcnss;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sa;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cnss;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $irpp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tcs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tot;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $opos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $indemtrans;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $indemaut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $retenu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $netpayer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sousdossier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sousdossier", inversedBy="etats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $liensousdossier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Moistraitement", inversedBy="etats")
     */
    private $moistraitement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalbas(): ?string
    {
        return $this->salbas;
    }

    public function setSalbas(string $salbas): self
    {
        $this->salbas = $salbas;

        return $this;
    }

    public function getPrimanc(): ?string
    {
        return $this->primanc;
    }

    public function setPrimanc(string $primanc): self
    {
        $this->primanc = $primanc;

        return $this;
    }

    public function getPrimaut(): ?string
    {
        return $this->primaut;
    }

    public function setPrimaut(string $primaut): self
    {
        $this->primaut = $primaut;

        return $this;
    }

    public function getPrimcnss(): ?string
    {
        return $this->primcnss;
    }

    public function setPrimcnss(string $primcnss): self
    {
        $this->primcnss = $primcnss;

        return $this;
    }

    public function getSa(): ?string
    {
        return $this->sa;
    }

    public function setSa(string $sa): self
    {
        $this->sa = $sa;

        return $this;
    }

    public function getCnss(): ?string
    {
        return $this->cnss;
    }

    public function setCnss(string $cnss): self
    {
        $this->cnss = $cnss;

        return $this;
    }

    public function getIrpp(): ?string
    {
        return $this->irpp;
    }

    public function setIrpp(string $irpp): self
    {
        $this->irpp = $irpp;

        return $this;
    }

    public function getTcs(): ?string
    {
        return $this->tcs;
    }

    public function setTcs(string $tcs): self
    {
        $this->tcs = $tcs;

        return $this;
    }

    public function getUat(): ?string
    {
        return $this->uat;
    }

    public function setUat(string $uat): self
    {
        $this->uat = $uat;

        return $this;
    }

    public function getTot(): ?string
    {
        return $this->tot;
    }

    public function setTot(string $tot): self
    {
        $this->tot = $tot;

        return $this;
    }

    public function getOpos(): ?string
    {
        return $this->opos;
    }

    public function setOpos(string $opos): self
    {
        $this->opos = $opos;

        return $this;
    }

    public function getIndemtrans(): ?string
    {
        return $this->indemtrans;
    }

    public function setIndemtrans(string $indemtrans): self
    {
        $this->indemtrans = $indemtrans;

        return $this;
    }

    public function getIndemaut(): ?string
    {
        return $this->indemaut;
    }

    public function setIndemaut(string $indemaut): self
    {
        $this->indemaut = $indemaut;

        return $this;
    }

    public function getPret(): ?string
    {
        return $this->pret;
    }

    public function setPret(string $pret): self
    {
        $this->pret = $pret;

        return $this;
    }

    public function getRetenu(): ?string
    {
        return $this->retenu;
    }

    public function setRetenu(string $retenu): self
    {
        $this->retenu = $retenu;

        return $this;
    }

    public function getNetpayer(): ?string
    {
        return $this->netpayer;
    }

    public function setNetpayer(string $netpayer): self
    {
        $this->netpayer = $netpayer;

        return $this;
    }

    public function getSousdossier(): ?string
    {
        return $this->sousdossier;
    }

    public function setSousdossier(string $sousdossier): self
    {
        $this->sousdossier = $sousdossier;

        return $this;
    }

    public function getLiensousdossier(): ?sousdossier
    {
        return $this->liensousdossier;
    }

    public function setLiensousdossier(?sousdossier $liensousdossier): self
    {
        $this->liensousdossier = $liensousdossier;

        return $this;
    }

    public function getMoistraitement(): ?moistraitement
    {
        return $this->moistraitement;
    }

    public function setMoistraitement(?moistraitement $moistraitement): self
    {
        $this->moistraitement = $moistraitement;

        return $this;
    }
}
