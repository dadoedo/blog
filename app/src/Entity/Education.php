<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\EducationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Education
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $institution = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $program = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $achievedDegree = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $yearsSpent = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $comment = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getInstitution(): ?string
    {
        return $this->institution;
    }

    public function setInstitution(?string $institution): self
    {
        $this->institution = $institution;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getProgram(): ?string
    {
        return $this->program;
    }

    public function setProgram(?string $program): self
    {
        $this->program = $program;
        return $this;
    }

    public function getAchievedDegree(): ?string
    {
        return $this->achievedDegree;
    }

    public function setAchievedDegree(?string $achievedDegree): self
    {
        $this->achievedDegree = $achievedDegree;
        return $this;
    }

    public function getYearsSpent(): ?int
    {
        return $this->yearsSpent;
    }

    public function setYearsSpent(?int $yearsSpent): self
    {
        $this->yearsSpent = $yearsSpent;
        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }
}
