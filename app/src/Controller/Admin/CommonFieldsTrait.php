<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

trait CommonFieldsTrait
{
    protected function configureCommonFields(): array
    {
        return [
            DateTimeField::new('createdAt')->onlyOnIndex()->setFormat('yyyy-MM-dd HH:mm:ss'),
            DateTimeField::new('updatedAt')->onlyOnIndex()->setFormat('yyyy-MM-dd HH:mm:ss'),
        ];
    }
}
