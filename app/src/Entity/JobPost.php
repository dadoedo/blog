<?php

namespace App\Entity;

use App\Repository\JobPostRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobPostRepository::class)]
class JobPost
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $keywords = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $content = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $publishedFrom = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $publishedTo = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $priority = null;

    #[ORM\ManyToOne(targetEntity: Candidate::class)]
    #[ORM\JoinColumn(name: 'candidate_id', referencedColumnName: 'id', nullable: true)]
    private ?Candidate $candidate = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $expectedSalaryMin = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $expectedSalaryMax = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getPublishedFrom(): ?\DateTimeInterface
    {
        return $this->publishedFrom;
    }

    public function setPublishedFrom(?\DateTimeInterface $publishedFrom): self
    {
        $this->publishedFrom = $publishedFrom;
        return $this;
    }

    public function getPublishedTo(): ?\DateTimeInterface
    {
        return $this->publishedTo;
    }

    public function setPublishedTo(?\DateTimeInterface $publishedTo): self
    {
        $this->publishedTo = $publishedTo;
        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(?int $priority): self
    {
        $this->priority = $priority;
        return $this;
    }

    public function getCandidate(): ?Candidate
    {
        return $this->candidate;
    }

    public function setCandidate(?Candidate $candidate): self
    {
        $this->candidate = $candidate;
        return $this;
    }

    public function getExpectedSalaryMin(): ?int
    {
        return $this->expectedSalaryMin;
    }

    public function setExpectedSalaryMin(?int $expectedSalaryMin): self
    {
        $this->expectedSalaryMin = $expectedSalaryMin;
        return $this;
    }

    public function getExpectedSalaryMax(): ?int
    {
        return $this->expectedSalaryMax;
    }

    public function setExpectedSalaryMax(?int $expectedSalaryMax): self
    {
        $this->expectedSalaryMax = $expectedSalaryMax;
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

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTime();
    }
}
