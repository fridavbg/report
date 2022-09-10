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
    private ?int $plId = null;

    #[ORM\Column(length: 255)]
    private ?string $sector = null;

    #[ORM\Column]
    private ?int $lifetime = null;

    public function getplId(): ?int
    {
        return $this->plId;
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

    public function getLifetime(): ?int
    {
        return $this->lifetime;
    }

    public function setLifetime(int $lifetime): self
    {
        $this->lifetime = $lifetime;

        return $this;
    }
}
