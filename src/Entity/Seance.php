<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use App\Repository\SessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeanceRepository::class)]
class Seance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startTime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endTime = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?programme $programme = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?groupe $groupe = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?salle $salle = null;

    

    #[ORM\ManyToOne(targetEntity: 'user')]
    private ?user $user = null;

    #[ORM\OneToMany(targetEntity:TimetableSession::class, mappedBy: "seance")]
    private  $timetableSeances;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): static
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeInterface $endTime): static
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getProgramme(): ?programme
    {
        return $this->programme;
    }

    public function setProgramme(?programme $programme): static
    {
        $this->programme = $programme;

        return $this;
    }

    public function getGroupe(): ?groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?groupe $groupe): static
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getSalle(): ?salle
    {
        return $this->salle;
    }

    public function setSalle(?salle $salle): static
    {
        $this->salle = $salle;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|TimetableSession[]
     */
    public function getTimetableSeances(): Collection
    {
        return $this->timetableSeances;
    }

    public function addTimetableSeances(TimetableSession $timetableSeance): self
    {
        if (!$this->timetableSeances->contains($timetableSeance)) {
            $this->timetableSeances[] = $timetableSeance;
            $timetableSeance->setSeance($this);
        }

        return $this;
    }

    public function removeTimetableSeancesn(TimetableSession $timetableSeance): self
    {
        if ($this->timetableSeances->removeElement($timetableSeance)) {
            
            if ($timetableSeance->getSeance() === $this) {
                $timetableSeance->setSeance(null);
            }
        }

        return $this;
    }
}
