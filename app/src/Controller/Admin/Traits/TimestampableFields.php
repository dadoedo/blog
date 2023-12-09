<?php

namespace App\Controller\Admin\Traits;

use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

trait TimestampableFields
{
    protected function configureTimestampableFields(): array
    {
        return [
            DateTimeField::new('createdAt')->onlyOnIndex()->setFormat('yyyy-MM-dd HH:mm:ss'),
            DateTimeField::new('updatedAt')->onlyOnIndex()->setFormat('yyyy-MM-dd HH:mm:ss'),
        ];
    }
}
