<?php

namespace App\Entity;

use App\Repository\SoutenanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoutenanceRepository::class)]
class Soutenance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numjury = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $datesoutenance = null;

    #[ORM\Column] 
    private ?float $note = null;

    #[ORM\ManyToOne(targetEntity: Enseignant::class, inversedBy: 'soutenances')]
    #[ORM\JoinColumn(name: 'enseignant_matricule', referencedColumnName: 'matricule', nullable: false)]
    private ?Enseignant $relation = null;

   
    #[ORM\ManyToOne(targetEntity: Etudiant::class, inversedBy: 'soutenances')]
    #[ORM\JoinColumn(name: 'etudiant_id', referencedColumnName: 'nce', nullable: false)]
    private ?Etudiant $etudiant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumjury(): ?int
    {
        return $this->numjury;
    }

    public function setNumjury(int $numjury): static
    {
        $this->numjury = $numjury;

        return $this;
    }

    public function getDatesoutenance(): ?\DateTime
    {
        return $this->datesoutenance;
    }

    public function setDatesoutenance(\DateTime $datesoutenance): static
    {
        $this->datesoutenance = $datesoutenance;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getRelation(): ?Enseignant
    {
        return $this->relation;
    }

    public function setRelation(?Enseignant $relation): static
    {
        $this->relation = $relation;

        return $this;
    }

     public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): static
    {
        $this->etudiant = $etudiant;
        return $this;
    }

}
