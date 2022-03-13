<?php

namespace App\Entity;

use App\Repository\ConduireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConduireRepository::class)]
class Conduire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $realiser_at;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private $partir;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private $arriver;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $distance;

    #[ORM\Column(type: 'integer')]
    private $compteur;

    #[ORM\Column(type: 'text', nullable: true)]
    private $commentaire;

    #[ORM\ManyToOne(targetEntity: Vehicule::class, inversedBy: 'trajets')]
    #[ORM\JoinColumn(nullable: false)]
    private $vehicule;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'trajets')]
    #[ORM\JoinColumn(nullable: false)]
    private $conducteur;

    #[ORM\OneToMany(mappedBy: 'trajet', targetEntity: Ravitailler::class)]
    private $carburant;

    #[ORM\OneToMany(mappedBy: 'trajet', targetEntity: Charge::class)]
    private $charges;

    public function __construct()
    {
        $this->carburant = new ArrayCollection();
        $this->charges = new ArrayCollection();
    }

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

    public function getPartir(): ?string
    {
        return $this->partir;
    }

    public function setPartir(?string $partir): self
    {
        $this->partir = $partir;

        return $this;
    }

    public function getArriver(): ?string
    {
        return $this->arriver;
    }

    public function setArriver(?string $arriver): self
    {
        $this->arriver = $arriver;

        return $this;
    }

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(?int $distance): self
    {
        $this->distance = $distance;

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

    public function getConducteur(): ?User
    {
        return $this->conducteur;
    }

    public function setConducteur(?User $conducteur): self
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    public function getCompteur(): ?int
    {
        return $this->compteur;
    }

    public function setCompteur(int $compteur): self
    {
        $this->compteur = $compteur;

        return $this;
    }

    /**
     * @return Collection|Ravitailler[]
     */
    public function getCarburant(): Collection
    {
        return $this->carburant;
    }

    public function addCarburant(Ravitailler $carburant): self
    {
        if (!$this->carburant->contains($carburant)) {
            $this->carburant[] = $carburant;
            $carburant->setTrajet($this);
        }

        return $this;
    }

    public function removeCarburant(Ravitailler $carburant): self
    {
        if ($this->carburant->removeElement($carburant)) {
            // set the owning side to null (unless already changed)
            if ($carburant->getTrajet() === $this) {
                $carburant->setTrajet(null);
            }
        }

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * @return Collection|Charge[]
     */
    public function getCharges(): Collection
    {
        return $this->charges;
    }

    public function addCharge(Charge $charge): self
    {
        if (!$this->charges->contains($charge)) {
            $this->charges[] = $charge;
            $charge->setTrajet($this);
        }

        return $this;
    }

    public function removeCharge(Charge $charge): self
    {
        if ($this->charges->removeElement($charge)) {
            // set the owning side to null (unless already changed)
            if ($charge->getTrajet() === $this) {
                $charge->setTrajet(null);
            }
        }

        return $this;
    }
}
