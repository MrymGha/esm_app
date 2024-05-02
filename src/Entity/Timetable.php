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

    /**
     * @var Collection<int, seance>
     */
    #[ORM\OneToMany(targetEntity: seance::class, mappedBy: 'timetable')]
    private Collection $seance;

    //#[ORM\ManyToOne(targetEntity:: 'timetables')]
    //private ?user $user = null;

    public function __construct()
    {
        $this->seance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, seance>
     */
    public function getSeance(): Collection
    {
        return $this->seance;
    }

    public function addSeance(seance $seance): static
    {
        if (!$this->seance->contains($seance)) {
            $this->seance->add($seance);
            $seance->setTimetable($this);
        }

        return $this;
    }

    public function removeSeance(seance $seance): static
    {
        if ($this->seance->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getTimetable() === $this) {
                $seance->setTimetable(null);
            }
        }

        return $this;
    }
   
}
