<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnelRepository")
 */
class Personnel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numcartesejour;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datevalidite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situationfamille;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $enfantscharge;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numsecuritesociale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codepostal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville_code_postal;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emploi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $qualification;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cocontrat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dureemois;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salaire_mensuel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avantages_natures;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $date_entree;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $datesortie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situationembauche;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $sex;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombre_epoux_se;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entreprise;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Dossier", inversedBy="personnels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dossier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getNumcartesejour(): ?string
    {
        return $this->numcartesejour;
    }

    public function setNumcartesejour(string $numcartesejour): self
    {
        $this->numcartesejour = $numcartesejour;

        return $this;
    }

    public function getDatevalidite(): ?\DateTimeInterface
    {
        return $this->datevalidite;
    }

    public function setDatevalidite(?\DateTimeInterface $datevalidite): self
    {
        $this->datevalidite = $datevalidite;

        return $this;
    }

    public function getSituationfamille(): ?string
    {
        return $this->situationfamille;
    }

    public function setSituationfamille(?string $situationfamille): self
    {
        $this->situationfamille = $situationfamille;

        return $this;
    }

    public function getEnfantscharge(): ?int
    {
        return $this->enfantscharge;
    }

    public function setEnfantscharge(?int $enfantscharge): self
    {
        $this->enfantscharge = $enfantscharge;

        return $this;
    }

    public function getNumsecuritesociale(): ?string
    {
        return $this->numsecuritesociale;
    }

    public function setNumsecuritesociale(string $numsecuritesociale): self
    {
        $this->numsecuritesociale = $numsecuritesociale;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(?string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getVilleCodePostal(): ?string
    {
        return $this->ville_code_postal;
    }

    public function setVilleCodePostal(?string $ville_code_postal): self
    {
        $this->ville_code_postal = $ville_code_postal;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getEmploi(): ?string
    {
        return $this->emploi;
    }

    public function setEmploi(string $emploi): self
    {
        $this->emploi = $emploi;

        return $this;
    }

    public function getQualification(): ?string
    {
        return $this->qualification;
    }

    public function setQualification(?string $qualification): self
    {
        $this->qualification = $qualification;

        return $this;
    }

    public function getCocontrat(): ?string
    {
        return $this->cocontrat;
    }

    public function setCocontrat(string $cocontrat): self
    {
        $this->cocontrat = $cocontrat;

        return $this;
    }

    public function getDureemois(): ?string
    {
        return $this->dureemois;
    }

    public function setDureemois(string $dureemois): self
    {
        $this->dureemois = $dureemois;

        return $this;
    }

    public function getSalaireMensuel(): ?string
    {
        return $this->salaire_mensuel;
    }

    public function setSalaireMensuel(string $salaire_mensuel): self
    {
        $this->salaire_mensuel = $salaire_mensuel;

        return $this;
    }

    public function getAvantagesNatures(): ?string
    {
        return $this->avantages_natures;
    }

    public function setAvantagesNatures(string $avantages_natures): self
    {
        $this->avantages_natures = $avantages_natures;

        return $this;
    }

    public function getDateEntree(): ?string
    {
        return $this->date_entree;
    }

    public function setDateEntree(string $date_entree): self
    {
        $this->date_entree = $date_entree;

        return $this;
    }

    public function getDatesortie(): ?string
    {
        return $this->datesortie;
    }

    public function setDatesortie(string $datesortie): self
    {
        $this->datesortie = $datesortie;

        return $this;
    }

    public function getSituationembauche(): ?string
    {
        return $this->situationembauche;
    }

    public function setSituationembauche(?string $situationembauche): self
    {
        $this->situationembauche = $situationembauche;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getNombreEpouxSe(): ?int
    {
        return $this->nombre_epoux_se;
    }

    public function setNombreEpouxSe(?int $nombre_epoux_se): self
    {
        $this->nombre_epoux_se = $nombre_epoux_se;

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

    public function getDossier(): ?dossier
    {
        return $this->dossier;
    }

    public function setDossier(?dossier $dossier): self
    {
        $this->dossier = $dossier;

        return $this;
    }
}
