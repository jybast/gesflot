<?php

namespace App\Entity;

use App\Repository\FicheTechniqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FicheTechniqueRepository::class)]
class FicheTechnique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $longueur;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $largeur;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $hauteur;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $coffre;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $empattement;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $porteafaux;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $reservoir;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $conso_urbaine;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $conso_mixte;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $transmission;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $boite;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $pneumatiques;

    #[ORM\OneToMany(mappedBy: 'fiche_technique', targetEntity: Vehicule::class)]
    private $vehicules;

    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLongueur(): ?string
    {
        return $this->longueur;
    }

    public function setLongueur(?string $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?string
    {
        return $this->largeur;
    }

    public function setLargeur(?string $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getHauteur(): ?string
    {
        return $this->hauteur;
    }

    public function setHauteur(string $hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getCoffre(): ?int
    {
        return $this->coffre;
    }

    public function setCoffre(?int $coffre): self
    {
        $this->coffre = $coffre;

        return $this;
    }

    public function getEmpattement(): ?string
    {
        return $this->empattement;
    }

    public function setEmpattement(?string $empattement): self
    {
        $this->empattement = $empattement;

        return $this;
    }

    public function getPorteafaux(): ?string
    {
        return $this->porteafaux;
    }

    public function setPorteafaux(string $porteafaux): self
    {
        $this->porteafaux = $porteafaux;

        return $this;
    }

    public function getReservoir(): ?int
    {
        return $this->reservoir;
    }

    public function setReservoir(?int $reservoir): self
    {
        $this->reservoir = $reservoir;

        return $this;
    }

    public function getConsoUrbaine(): ?string
    {
        return $this->conso_urbaine;
    }

    public function setConsoUrbaine(?string $conso_urbaine): self
    {
        $this->conso_urbaine = $conso_urbaine;

        return $this;
    }

    public function getConsoMixte(): ?string
    {
        return $this->conso_mixte;
    }

    public function setConsoMixte(?string $conso_mixte): self
    {
        $this->conso_mixte = $conso_mixte;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(?string $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getBoite(): ?string
    {
        return $this->boite;
    }

    public function setBoite(?string $boite): self
    {
        $this->boite = $boite;

        return $this;
    }

    public function getPneumatiques(): ?string
    {
        return $this->pneumatiques;
    }

    public function setPneumatiques(?string $pneumatiques): self
    {
        $this->pneumatiques = $pneumatiques;

        return $this;
    }

    /**
     * @return Collection|Vehicule[]
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules[] = $vehicule;
            $vehicule->setFicheTechnique($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getFicheTechnique() === $this) {
                $vehicule->setFicheTechnique(null);
            }
        }

        return $this;
    }
}
