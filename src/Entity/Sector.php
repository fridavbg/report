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
    private ?int $sId = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $year = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $primaryPlasticProd = null;

    public function getId(): ?int
    {
        return $this->sId;
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
        return $this->primaryPlasticProd;
    }

    public function setPrimaryPlasticProductionMillionTonnes(string $primaryPlasticProd): self
    {
        $this->primaryPlasticProd = $primaryPlasticProd;

        return $this;
    }
}
