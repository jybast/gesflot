<?php

namespace App\Entity;

use App\Repository\ChargeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChargeRepository::class)]
class Charge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150)]
    private $titre;

    #[ORM\Column(type: 'date')]
    private $realiser_at;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $montant;

    #[ORM\Column(type: 'boolean')]
    private $is_periodique;

    #[ORM\ManyToOne(targetEntity: TypeCharge::class, inversedBy: 'charges')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;

    #[ORM\Column(type: 'date', nullable: true)]
    private $prochain_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
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

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getIsPeriodique(): ?bool
    {
        return $this->is_periodique;
    }

    public function setIsPeriodique(bool $is_periodique): self
    {
        $this->is_periodique = $is_periodique;

        return $this;
    }

    public function getType(): ?TypeCharge
    {
        return $this->type;
    }

    public function setType(?TypeCharge $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getProchainAt(): ?\DateTimeInterface
    {
        return $this->prochain_at;
    }

    public function setProchainAt(?\DateTimeInterface $prochain_at): self
    {
        $this->prochain_at = $prochain_at;

        return $this;
    }
}
