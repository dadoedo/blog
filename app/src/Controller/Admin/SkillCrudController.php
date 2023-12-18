<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Traits\TimestampableFields;
use App\Entity\Skill;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SkillCrudController extends AbstractCrudController
{
    use TimestampableFields;

    public static function getEntityFqcn(): string
    {
        return Skill::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            TextField::new('name'),
            TextEditorField::new('description'),
        ];

        return array_merge($fields, $this->configureTimestampableFields());
    }
}
