<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorii;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="category", requirements={"id"="\d+"})
     */
    public function index(int $id = 0)
    {
      $repository_category = $this->getDoctrine()->getRepository(Categorii::class);

      if($id){
        $category_array = $repository_category->find($id);
        return $this->render('category_id/index.html.twig', [
            'controller_name' => 'CategoryController',
            'category_array' => $category_array,
            'name_page' => "category_id"
        ]);
      }else{
        $category_array = $repository_category->findAll();
        return $this->render('category/index.html.twig', [
          'controller_name' => 'CategoryController',
          'category_array' => array('category' => $category_array),
          'name_page' => "category"
        ]);
      }
    }
}
