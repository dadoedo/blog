<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Traits\TimestampableFields;
use App\Entity\ProfessionCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProfessionCategoryCrudController extends AbstractCrudController
{
    use TimestampableFields;

    public static function getEntityFqcn(): string
    {
        return ProfessionCategory::class;
    }



    public function configureFields(string $pageName): iterable
    {
        $specificFields = [
            TextField::new('Title'),
            TextEditorField::new('Description'),
        ];

        return array_merge($specificFields, $this->configureTimestampableFields());
    }
}
