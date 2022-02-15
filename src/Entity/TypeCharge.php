<?php

namespace App\Entity;

use App\Repository\TypeChargeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeChargeRepository::class)]
class TypeCharge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150, unique: true)]
    private $titre;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Charge::class)]
    private $charges;

    public function __construct()
    {
        $this->charges = new ArrayCollection();
    }

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
            $charge->setType($this);
        }

        return $this;
    }

    public function removeCharge(Charge $charge): self
    {
        if ($this->charges->removeElement($charge)) {
            // set the owning side to null (unless already changed)
            if ($charge->getType() === $this) {
                $charge->setType(null);
            }
        }

        return $this;
    }
}
