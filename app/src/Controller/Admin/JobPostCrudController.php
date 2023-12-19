<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Traits\TimestampableFields;
use App\Entity\JobPost;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobPostCrudController extends AbstractCrudController
{

    use TimestampableFields;

    public static function getEntityFqcn(): string
    {
        return JobPost::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $specificFields = [
            TextField::new('title', 'Title'),
            AssociationField::new('company', 'Company'),
            Textfield::new('keywords', 'List Keywords separated by commas'),
            TextEditorField::new('content', 'Full Post Content'),
            DateTimeField::new('publishedFrom', 'Published From'),
            DateTimeField::new('publishedTo', 'Published To'),
            IntegerField::new('priority', 'Priority'),
        ];

        return array_merge($specificFields, $this->configureTimestampableFields());
    }
}