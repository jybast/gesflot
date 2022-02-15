<?php

namespace App\Entity;

use App\Repository\EntretienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntretienRepository::class)]
class Entretien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150)]
    private $titre;

    #[ORM\Column(type: 'boolean')]
    private $is_periodique;

    #[ORM\Column(type: 'date')]
    private $realiser_at;

    #[ORM\ManyToOne(targetEntity: TypeEntretien::class, inversedBy: 'entretiens')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;

    #[ORM\OneToMany(mappedBy: 'maintenir', targetEntity: Entretenir::class)]
    private $maintenances;

    public function __construct()
    {
        $this->maintenances = new ArrayCollection();
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

    public function getIsPeriodique(): ?bool
    {
        return $this->is_periodique;
    }

    public function setIsPeriodique(bool $is_periodique): self
    {
        $this->is_periodique = $is_periodique;

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

    public function getType(): ?TypeEntretien
    {
        return $this->type;
    }

    public function setType(?TypeEntretien $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Entretenir[]
     */
    public function getMaintenances(): Collection
    {
        return $this->maintenances;
    }

    public function addMaintenance(Entretenir $maintenance): self
    {
        if (!$this->maintenances->contains($maintenance)) {
            $this->maintenances[] = $maintenance;
            $maintenance->setMaintenir($this);
        }

        return $this;
    }

    public function removeMaintenance(Entretenir $maintenance): self
    {
        if ($this->maintenances->removeElement($maintenance)) {
            // set the owning side to null (unless already changed)
            if ($maintenance->getMaintenir() === $this) {
                $maintenance->setMaintenir(null);
            }
        }

        return $this;
    }
}
