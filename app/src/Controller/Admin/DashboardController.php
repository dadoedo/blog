<?php

namespace App\Controller\Admin;

use App\Entity\Candidate;
use App\Entity\Company;
use App\Entity\Education;
use App\Entity\JobPost;
use App\Entity\Profession;
use App\Entity\ProfessionCategory;
use App\Entity\Skill;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractDashboardController
{
//    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();
        return $this->render('admin/index.html.twig', [
            'companyCount' => rand(0,10),
            'candidateCount' => rand(0,10),
            'jobPostingCount' => rand(0,10),
        ]);
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My Big Corporation s.r.o.');
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-dashboard');

        yield MenuItem::section('Users');
        yield MenuItem::linkToCrud('Companies', 'fa fa-tags', Company::class);
        yield MenuItem::linkToCrud('Candidates', 'fa fa-tags', Candidate::class);

        yield MenuItem::section('Posts');
        yield MenuItem::linkToCrud('Job Postings', 'fa fa-tags', JobPost::class);

        yield MenuItem::section('Other');
        yield MenuItem::linkToCrud('Educations', 'fa fa-tags', Education::class);
        yield MenuItem::linkToCrud('User Skills', 'fa fa-tags', Skill::class);
        yield MenuItem::linkToCrud('Professions', 'fa fa-tags', Profession::class);
        yield MenuItem::linkToCrud('Categories of Professions', 'fa fa-tags', ProfessionCategory::class);

    }
}
