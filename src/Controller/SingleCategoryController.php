<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SingleCategoryController extends AbstractController
{
    /**
     * @Route("/category/{name}", name="single_category")
     */
    public function index(string $name, CategoryRepository $categoryRepository): Response
    {
        return $this->render('single_category/index.html.twig', [
            'controller_name' => 'SingleCategoryController',
            'category' => $categoryRepository->findOneBy(["name" => $name])
        ]);
    }
}
