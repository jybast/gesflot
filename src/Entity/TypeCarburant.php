<?php

namespace App\Entity;

use App\Repository\TypeCarburantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeCarburantRepository::class)]
class TypeCarburant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 5, unique: true)]
    private $code;

    #[ORM\Column(type: 'string', length: 20)]
    private $titre;

    #[ORM\Column(type: 'string', length: 20)]
    private $nom;

    #[ORM\OneToMany(mappedBy: 'typeCarburant', targetEntity: Ravitailler::class)]
    private $ravitailler;

    public function __construct()
    {
        $this->ravitailler = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Ravitailler[]
     */
    public function getRavitailler(): Collection
    {
        return $this->ravitailler;
    }

    public function addRavitailler(Ravitailler $ravitailler): self
    {
        if (!$this->ravitailler->contains($ravitailler)) {
            $this->ravitailler[] = $ravitailler;
            $ravitailler->setTypeCarburant($this);
        }

        return $this;
    }

    public function removeRavitailler(Ravitailler $ravitailler): self
    {
        if ($this->ravitailler->removeElement($ravitailler)) {
            // set the owning side to null (unless already changed)
            if ($ravitailler->getTypeCarburant() === $this) {
                $ravitailler->setTypeCarburant(null);
            }
        }

        return $this;
    }
}
