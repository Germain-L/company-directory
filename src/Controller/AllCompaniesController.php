<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllCompaniesController extends AbstractController
{
    /**
     * @Route("/", name="all_companies")
     */
    public function index(CompanyRepository $companyRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('all_companies/index.html.twig', [
            'controller_name' => 'AllCompaniesController',
            'companies' => $companyRepository->findAll(),
        ]);
    }
}
