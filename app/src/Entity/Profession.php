<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\ProfessionRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessionRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Profession
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: ProfessionCategory::class)]
    #[ORM\JoinColumn(name: 'main_category_id', referencedColumnName: 'id', nullable: true)]
    private Collection $categories;

    #[ORM\ManyToOne(targetEntity: ProfessionCategory::class)]
    #[ORM\JoinColumn(name: 'main_category_id', referencedColumnName: 'id', nullable: true)]
    private ?ProfessionCategory $mainCategory = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(ProfessionCategory $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(ProfessionCategory $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    public function getMainCategory(): ?ProfessionCategory
    {
        return $this->mainCategory;
    }

    public function setMainCategory(?ProfessionCategory $mainCategory): self
    {
        if ($mainCategory !== null) {
            $this->addCategory($mainCategory);
        }

        $this->mainCategory = $mainCategory;
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
