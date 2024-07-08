<?php

namespace App\Entity;

use ApiPlatform\Metadata as APIP;
use App\Repository\DummyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DummyRepository::class)]
#[APIP\ApiResource(
    operations: [
        new APIP\Get(),
        new APIP\GetCollection(),
        new APIP\Post(
            write: false
        )
    ]
)]
class Dummy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $someField =    null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $someOtherField = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSomeField(): ?string
    {
        return $this->someField;
    }

    public function setSomeField(string $someField): static
    {
        $this->someField = $someField;

        return $this;
    }

    public function getSomeOtherField(): ?string
    {
        return $this->someOtherField;
    }

    public function setSomeOtherField(string $someOtherField): static
    {
        $this->someOtherField = $someOtherField;

        return $this;
    }
}
