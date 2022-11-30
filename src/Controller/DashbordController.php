<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashbordController extends AbstractController
{
    #[Route('/dashbord', name: 'dashbord')]
    public function index(ProductRepository $productRepository, CategoryRepository $categoryRepository, ContactRepository $contactRepository ): Response
    {
        return $this->render('dashbord/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'products' => $productRepository->findAll(),
            'contacts' => $contactRepository->findAll(),
        ]);
    }
}
