<?php

namespace App\Entity;

use App\Repository\AssuranceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssuranceRepository::class)]
class Assurance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $valide_at;

    #[ORM\Column(type: 'date', nullable: true)]
    private $termine_at;

    #[ORM\Column(type: 'decimal', precision: 6, scale: 2)]
    private $montant;

    #[ORM\ManyToOne(targetEntity: Fournisseur::class, inversedBy: 'assurances')]
    #[ORM\JoinColumn(nullable: false)]
    private $fournisseur;

    #[ORM\ManyToOne(targetEntity: Vehicule::class, inversedBy: 'assurances')]
    private $vehicule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValideAt(): ?\DateTimeInterface
    {
        return $this->valide_at;
    }

    public function setValideAt(\DateTimeInterface $valide_at): self
    {
        $this->valide_at = $valide_at;

        return $this;
    }

    public function getTermineAt(): ?\DateTimeInterface
    {
        return $this->termine_at;
    }

    public function setTermineAt(?\DateTimeInterface $termine_at): self
    {
        $this->termine_at = $termine_at;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

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

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }
}
