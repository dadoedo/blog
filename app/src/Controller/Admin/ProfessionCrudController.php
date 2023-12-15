<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Traits\TimestampableFields;
use App\Entity\Profession;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
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
            TextField::new('Name'),
            TextEditorField::new('Description'),
            AssociationField::new('categories')->setFormTypeOptions([
                'by_reference' => false,
            ]),
            AssociationField::new('mainCategory'),
        ];

        return array_merge($specificFields, $this->configureTimestampableFields());
    }
}
