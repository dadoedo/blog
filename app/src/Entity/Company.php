<?php

namespace App\Entity;

use App\Enum\CompanySize;
use App\Repository\CompanyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
class Company extends User
{
    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $ico = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $dic = null;

    #[ORM\Column(type: 'string', nullable: true, enumType: CompanySize::class)]
    private CompanySize|null $size = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $field = null;


    public function __toString(): string
    {
        return $this->getName();
    }

    public function getIco(): ?string
    {
        return $this->ico;
    }

    public function setIco(?string $ico): self
    {
        $this->ico = $ico;
        return $this;
    }

    public function getDic(): ?string
    {
        return $this->dic;
    }

    public function setDic(?string $dic): self
    {
        $this->dic = $dic;
        return $this;
    }

    public function getField(): ?string
    {
        return $this->field;
    }

    public function setField(?string $field): self
    {
        $this->field = $field;
        return $this;
    }

    public function getSize(): ?CompanySize
    {
        return $this->size;
    }

    public function setSize(?CompanySize $size): void
    {
        $this->size = $size;
    }
}
