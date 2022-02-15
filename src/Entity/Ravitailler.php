<?php

namespace App\Entity;

use App\Repository\RavitaillerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RavitaillerRepository::class)]
class Ravitailler
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $realiser_at;

    #[ORM\Column(type: 'integer')]
    private $quantite;

    #[ORM\Column(type: 'decimal', precision: 6, scale: 2, nullable: true)]
    private $prix_unite;

    #[ORM\Column(type: 'decimal', precision: 6, scale: 2)]
    private $montant;

    #[ORM\ManyToOne(targetEntity: Conduire::class, inversedBy: 'carburant')]
    private $trajet;

    #[ORM\ManyToOne(targetEntity: TypeCarburant::class, inversedBy: 'ravitailler')]
    private $typeCarburant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRealiserAt(): ?\DateTimeInterface
    {
        return $this->realiser_at;
    }

    public function setRealiserAt(\DateTimeInterface $realiser_at): self
    {
        $this->realiser_at = $realiser_at;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixUnite(): ?string
    {
        return $this->prix_unite;
    }

    public function setPrixUnite(?string $prix_unite): self
    {
        $this->prix_unite = $prix_unite;

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

    public function getTrajet(): ?Conduire
    {
        return $this->trajet;
    }

    public function setTrajet(?Conduire $trajet): self
    {
        $this->trajet = $trajet;

        return $this;
    }

    public function getTypeCarburant(): ?TypeCarburant
    {
        return $this->typeCarburant;
    }

    public function setTypeCarburant(?TypeCarburant $typeCarburant): self
    {
        $this->typeCarburant = $typeCarburant;

        return $this;
    }
}
