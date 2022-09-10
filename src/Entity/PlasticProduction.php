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
    private ?int $ppId = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $plasticProduction = null;

    public function getppId(): ?int
    {
        return $this->ppId;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getPlasticsProductionMillionTones(): ?string
    {
        return $this->plasticProduction;
    }

    public function setPlasticsProductionMillionTones(string $plasticProduction): self
    {
        $this->plasticProduction = $plasticProduction;

        return $this;
    }
}
