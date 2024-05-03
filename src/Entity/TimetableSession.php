<?php

namespace App\Entity;

use App\Repository\TimetableSessionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimetableSessionRepository::class)]
class TimetableSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?timetable $timetable = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?seance $seance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTimetable(): ?timetable
    {
        return $this->timetable;
    }

    public function setTimetable(?timetable $timetable): static
    {
        $this->timetable = $timetable;

        return $this;
    }

    public function getSeance(): ?seance
    {
        return $this->seance;
    }

    public function setSeance(?seance $seance): static
    {
        $this->seance = $seance;

        return $this;
    }
}
