<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait Timestampable
{
    #[ORM\PrePersist]
    public function initializeTimestamps(): void
    {
        if ($this->createdAt === null) {
            $this->createdAt = new \DateTime();
        }

        if ($this->updatedAt === null) {
            $this->updatedAt = new \DateTime();
        }
    }

    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTime();
    }
}