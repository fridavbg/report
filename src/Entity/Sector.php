<?php

namespace App\Entity;

use App\Repository\SectorRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectorRepository::class)]
class Sector
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $year = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $primary_plastic_production_million_tonnes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getPrimaryPlasticProductionMillionTonnes(): ?string
    {
        return $this->primary_plastic_production_million_tonnes;
    }

    public function setPrimaryPlasticProductionMillionTonnes(string $primary_plastic_production_million_tonnes): self
    {
        $this->primary_plastic_production_million_tonnes = $primary_plastic_production_million_tonnes;

        return $this;
    }
}
