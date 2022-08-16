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
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column]
    private ?float $probability_of_plastic_being_emitted_to_ocean = null;

    public function getId(): ?int
    {
        return $this->id;
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
        return $this->probability_of_plastic_being_emitted_to_ocean;
    }

    public function setProbabilityOfPlasticBeingEmittedToOcean(float $probability_of_plastic_being_emitted_to_ocean): self
    {
        $this->probability_of_plastic_being_emitted_to_ocean = $probability_of_plastic_being_emitted_to_ocean;

        return $this;
    }
}
