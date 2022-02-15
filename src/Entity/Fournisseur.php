<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150)]
    private $titre;

    #[ORM\Column(type: 'string', length: 180, nullable: true)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 150)]
    private $ville;

    #[ORM\Column(type: 'string', length: 10)]
    private $codepostal;

    #[ORM\Column(type: 'string', length: 150, unique: true)]
    private $email;

    #[ORM\Column(type: 'string', length: 20)]
    private $telephone;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $contrat;

    #[ORM\Column(type: 'date', nullable: true)]
    private $contrat_at;

    #[ORM\OneToMany(mappedBy: 'fournisseur', targetEntity: Assurance::class)]
    private $assurances;

    public function __construct()
    {
        $this->assurances = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getContrat(): ?string
    {
        return $this->contrat;
    }

    public function setContrat(?string $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    public function getContratAt(): ?\DateTimeInterface
    {
        return $this->contrat_at;
    }

    public function setContratAt(?\DateTimeInterface $contrat_at): self
    {
        $this->contrat_at = $contrat_at;

        return $this;
    }

    /**
     * @return Collection|Assurance[]
     */
    public function getAssurances(): Collection
    {
        return $this->assurances;
    }

    public function addAssurance(Assurance $assurance): self
    {
        if (!$this->assurances->contains($assurance)) {
            $this->assurances[] = $assurance;
            $assurance->setFournisseur($this);
        }

        return $this;
    }

    public function removeAssurance(Assurance $assurance): self
    {
        if ($this->assurances->removeElement($assurance)) {
            // set the owning side to null (unless already changed)
            if ($assurance->getFournisseur() === $this) {
                $assurance->setFournisseur(null);
            }
        }

        return $this;
    }
}
