<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Traits\PasswordFields;
use App\Controller\Admin\Traits\TimestampableFields;
use App\Entity\Candidate;
use App\Enum\Gender;
use App\Form\CandidateSkillType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CandidateCrudController extends AbstractCrudController
{
    use TimestampableFields;
    use PasswordFields;

    public static function getEntityFqcn(): string
    {
        return Candidate::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            TextField::new('name', 'Name'),
            TextEditorField::new('about', 'About'),
            TextField::new('email', 'Email'),
        ];

        $fields = array_merge($fields, $this->configurePasswordFields($pageName));

        $fields = array_merge($fields, [
            ChoiceField::new('gender', 'Gender')
                ->setChoices(Gender::cases()),
            DateField::new('dateOfBirth', 'Date Of Birth')
                ->renderAsNativeWidget(),
            CollectionField::new('candidateSkills', 'Skills')
                ->setEntryIsComplex()
                ->setFormTypeOptions(['by_reference' => false])
                ->setEntryType(CandidateSkillType::class)
        ]);

        return array_merge($fields, $this->configureTimestampableFields());
    }
}
