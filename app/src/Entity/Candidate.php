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

    #[ORM\OneToMany(mappedBy: 'candidate', targetEntity: CandidateSkill::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $candidateSkills;

    public function __construct()
    {
        $this->candidateSkills = new ArrayCollection();
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

    public function getCandidateSkills(): Collection
    {
        return $this->candidateSkills;
    }

    public function addCandidateSkill(CandidateSkill $candidateSkill): self
    {
        if (!$this->candidateSkills->contains($candidateSkill)) {
            $this->candidateSkills[] = $candidateSkill;
            $candidateSkill->setCandidate($this);
        }
        return $this;
    }

    public function removeCandidateSkill(CandidateSkill $candidateSkill): self
    {
        if ($this->candidateSkills->removeElement($candidateSkill)) {
            // set the owning side to null (unless already changed)
            if ($candidateSkill->getCandidate() === $this) {
                $candidateSkill->setCandidate(null);
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

