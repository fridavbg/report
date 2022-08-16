<?php

namespace App\Entity;

use App\Repository\PlasticProductionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlasticProductionRepository::class)]
class PlasticProduction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Year = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $plastics_production_million_tones = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->Year;
    }

    public function setYear(int $Year): self
    {
        $this->Year = $Year;

        return $this;
    }

    public function getPlasticsProductionMillionTones(): ?string
    {
        return $this->plastics_production_million_tones;
    }

    public function setPlasticsProductionMillionTones(string $plastics_production_million_tones): self
    {
        $this->plastics_production_million_tones = $plastics_production_million_tones;

        return $this;
    }
}
