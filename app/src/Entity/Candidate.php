<?php

namespace App\Entity;

use App\Enum\Gender;
use App\Repository\CandidateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidateRepository::class)]
class Candidate extends User
{
    #[ORM\Column(type: 'json', nullable: true)]
    private array $interests = [];

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateOfBirth = null;

    #[ORM\Column(type: 'string', length: 10, nullable: true, enumType: Gender::class)]
    private Gender|null $gender = null;
    #[ORM\OneToMany(mappedBy: 'candidate', targetEntity: Skill::class)]
    private Collection $skills;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }

    public function getInterests(): array
    {
        return $this->interests;
    }

    public function setInterests(array $interests): self
    {
        $this->interests = $interests;
        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill, string $seniority, int $monthsActive, ?string $comment): self
    {
        if (!$this->skills->contains($skill)) {
            $candidateSkill = new CandidateSkill($this, $skill, $seniority, $monthsActive, $comment);
            $this->skills[] = $candidateSkill;
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        foreach ($this->skills as $candidateSkill) {
            if ($candidateSkill->getSkill() === $skill) {
                $this->skills->removeElement($candidateSkill);
            }
        }

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): void
    {
        $this->gender = $gender;
    }
}

