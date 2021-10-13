<?php

namespace App\Controller;

use App\Repository\CompanyRepository;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SingleCompanyController extends AbstractController
{
    /**
     * @Route("/company/{name}", name="single_company")
     */
    public function index(string $name, CompanyRepository $companyRepository): Response
    {
        $company = $companyRepository->findBy(["name" => $name]);


        if ($company) {
            return $this->render('single_company/index.html.twig', [
                'controller_name' => 'SingleCompanyController',
                'company' => $company[0]
            ]);
        }

        return $this->render('single_company/404.html.twig', [
            'controller_name' => 'SingleCompanyController',
            'name' => $name
        ]);
    }
}
