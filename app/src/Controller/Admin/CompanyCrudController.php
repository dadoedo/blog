<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Traits\PasswordFields;
use App\Controller\Admin\Traits\TimestampableFields;
use App\Entity\Company;
use App\Enum\CompanySize;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CompanyCrudController extends AbstractCrudController
{
    use TimestampableFields;
    use PasswordFields;

    public function __construct(
        protected UserPasswordHasherInterface $passwordHasher,
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return Company::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            TextField::new('name', 'Name'),
            TextEditorField::new('about', 'About'),
            TextField::new('email', 'Email')
        ];

        $fields = array_merge($fields, $this->configurePasswordFields($pageName));

        $fields = array_merge($fields, [
            ChoiceField::new('size', 'Company Size')
            ->setChoices(CompanySize::cases()),
            TextField::new('ico', 'ICO'),
            TextField::new('dic', 'DIC'),
        ]);

        return array_merge($fields, $this->configureTimestampableFields());
    }
}
