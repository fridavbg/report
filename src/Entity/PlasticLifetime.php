<?php

namespace App\Entity;

use App\Repository\PlasticLifetimeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlasticLifetimeRepository::class)]
class PlasticLifetime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $sector = null;

    #[ORM\Column]
    private ?int $lifetime_in_years = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSector(): ?string
    {
        return $this->sector;
    }

    public function setSector(string $sector): self
    {
        $this->sector = $sector;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getLifetimeInYears(): ?int
    {
        return $this->lifetime_in_years;
    }

    public function setLifetimeInYears(int $lifetime_in_years): self
    {
        $this->lifetime_in_years = $lifetime_in_years;

        return $this;
    }
}
