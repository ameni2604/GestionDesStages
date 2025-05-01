<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnseignantRepository::class)]
class Enseignant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $matricule = null;

    #[ORM\Column(length: 20)]
    private ?string $nom = null;

    #[ORM\Column(length: 20)]
    private ?string $prenom = null;

    /**
     * @var Collection<int, Soutenance>
     */
    #[ORM\OneToMany(targetEntity: Soutenance::class, mappedBy: 'enseignant')]
    private Collection $soutenances;

    public function __construct()
    {
        $this->soutenances = new ArrayCollection();
    }
  

    public function getMatricule(): ?int
    {
        return $this->matricule;
    }

    // Pas de setter pour la clé auto-incrémentée en général

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return Collection<int, Soutenance>
     */
    public function getNumjury(): Collection
    {
        return $this->numjury;
    }

    public function addNumjury(Soutenance $numjury): static
    {
        if (!$this->numjury->contains($numjury)) {
            $this->numjury->add($numjury);
            $numjury->setRelation($this);
        }

        return $this;
    }

    public function removeNumjury(Soutenance $numjury): static
    {
        if ($this->numjury->removeElement($numjury)) {
            // set the owning side to null (unless already changed)
            if ($numjury->getRelation() === $this) {
                $numjury->setRelation(null);
            }
        }

        return $this;
    }

  

}
