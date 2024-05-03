<?php

namespace App\Entity;

use App\Repository\TimetableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimetableRepository::class)]
class Timetable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: TimetableSession::class, mappedBy: 'timetable')]
    private $timetableSeances;

    public function __construct()
    {
        $this->timetableSeances = new ArrayCollection();
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
            $timetableSeance->setTimetable($this);
        }

        return $this;
    }

    public function removeTimetableSeancesn(TimetableSession $timetableSeance): self
    {
        if ($this->timetableSeances->removeElement($timetableSeance)) {
            
            if ($timetableSeance->getTimetable() === $this) {
                $timetableSeance->setTimetable(null);
            }
        }

        return $this;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

   

   
   
   

    
   
}
