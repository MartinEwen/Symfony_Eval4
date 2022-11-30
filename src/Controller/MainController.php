<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProductRepository $productRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'products' => $productRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}
