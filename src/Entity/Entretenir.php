<?php

namespace App\Entity;

use App\Repository\EntretenirRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntretenirRepository::class)]
class Entretenir
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Vehicule::class, inversedBy: 'entretiens')]
    private $vehicule;

    #[ORM\ManyToOne(targetEntity: Entretien::class, inversedBy: 'maintenances')]
    private $maintenir;

    #[ORM\ManyToOne(targetEntity: Fournisseur::class, inversedBy: 'entretiens')]
    private $fournisseur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getMaintenir(): ?Entretien
    {
        return $this->maintenir;
    }

    public function setMaintenir(?Entretien $maintenir): self
    {
        $this->maintenir = $maintenir;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }
}
