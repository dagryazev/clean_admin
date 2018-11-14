<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Orders;

class OrderController extends AbstractController
{
    /**
     * @Route("/order/", name="order")
     */
    public function index($id = false)
    {
      $repository = $this->getDoctrine()->getRepository(Orders::class);

      $orders_array = $repository->findAll();
        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
            'orders_array' => array('order' => $orders_array),
            'name_page' => "order"
        ]);
    }
}
