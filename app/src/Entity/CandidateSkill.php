<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class CandidateSkill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Candidate::class, inversedBy: 'candidateSkills')]
    private Candidate $candidate;

    #[ORM\ManyToOne(targetEntity: Skill::class, inversedBy: 'candidateSkills')]
    private Skill $skill;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $seniority;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $monthsActive;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $comment;

    public function __toString(): string
    {
        return $this->candidate->getName() .  ' - ' . $this->skill->getName();   // TODO: Implement __toString() method.
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCandidate(): Candidate
    {
        return $this->candidate;
    }

    public function setCandidate(Candidate $candidate): void
    {
        $this->candidate = $candidate;
    }

    public function getSkill(): Skill
    {
        return $this->skill;
    }

    public function setSkill(Skill $skill): void
    {
        $this->skill = $skill;
    }

    public function getSeniority(): ?string
    {
        return $this->seniority;
    }

    public function setSeniority(?string $seniority): self
    {
        $this->seniority = $seniority;
        return $this;
    }

    public function getMonthsActive(): ?int
    {
        return $this->monthsActive;
    }

    public function setMonthsActive(?int $monthsActive): self
    {
        $this->monthsActive = $monthsActive;
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
}