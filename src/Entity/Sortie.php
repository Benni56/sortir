<?php

namespace App\Entity;

use App\Repository\SortieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SortieRepository::class)
 */
class Sortie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateClotureInscription;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreInscriptionMax;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $descriptionInfos;

    /**
     * @ORM\ManyToOne(targetEntity=Etat::class, inversedBy="sorties")
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity=lieu::class, inversedBy="sorties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieux;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDateClotureInscription(): ?\DateTimeInterface
    {
        return $this->dateClotureInscription;
    }

    public function setDateClotureInscription(\DateTimeInterface $dateClotureInscription): self
    {
        $this->dateClotureInscription = $dateClotureInscription;

        return $this;
    }

    public function getNombreInscriptionMax(): ?int
    {
        return $this->nombreInscriptionMax;
    }

    public function setNombreInscriptionMax(int $nombreInscriptionMax): self
    {
        $this->nombreInscriptionMax = $nombreInscriptionMax;

        return $this;
    }

    public function getDescriptionInfos(): ?string
    {
        return $this->descriptionInfos;
    }

    public function setDescriptionInfos(?string $descriptionInfos): self
    {
        $this->descriptionInfos = $descriptionInfos;

        return $this;
    }

    public function getLieux(): ?lieu
    {
        return $this->lieux;
    }

    public function setLieux(?lieu $lieux): self
    {
        $this->lieux = $lieux;

        return $this;
    }

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?Etat $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
