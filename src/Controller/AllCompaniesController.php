<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AllCompaniesController extends AbstractController
{
    /**
     * @Route("/", name="all_companies")
     */
    public function index(Request $request, CompanyRepository $companyRepository, CategoryRepository $categoryRepository): Response
    {
        $search = $request->query->get('searchTerm');

        if (!$search) {
            return $this->render('all_companies/index.html.twig', [
                'controller_name' => 'AllCompaniesController',
                'companies' => $companyRepository->findAll(),
            ]);
        }

        return $this->render('all_companies/index.html.twig', [
            'controller_name' => 'AllCompaniesController',
            'companies' => $companyRepository->findByNameField($search),
        ]);
    }
}
