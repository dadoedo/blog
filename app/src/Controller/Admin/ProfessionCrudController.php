<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Traits\TimestampableFields;
use App\Entity\Profession;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProfessionCrudController extends AbstractCrudController
{
    use TimestampableFields;

    public static function getEntityFqcn(): string
    {
        return Profession::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $specificFields = [
            TextField::new('name'),
            TextEditorField::new('description'),
        ];

        return array_merge($this->configureTimestampableFields(), $specificFields);
    }
}
