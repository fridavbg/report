<?php

namespace App\Entity;

use App\Repository\MismanagedPlasticRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MismanagedPlasticRepository::class)]
class MismanagedPlastic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $mprId = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column]
    private ?float $probPlasticOcean = null;

    public function getMprId(): ?int
    {
        return $this->mprId;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
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

    public function getProbabilityOfPlasticBeingEmittedToOcean(): ?float
    {
        return $this->probPlasticOcean;
    }

    public function setProbabilityOfPlasticBeingEmittedToOcean(float $probPlasticOcean): self
    {
        $this->probPlasticOcean = $probPlasticOcean;

        return $this;
    }
}
