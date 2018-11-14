<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryIdController extends AbstractController
{
    /**
     * @Route("/category/id", name="category_id")
     */
    public function index()
    {
        return $this->render('category_id/index.html.twig', [
            'controller_name' => 'CategoryIdController',
        ]);
    }
}
