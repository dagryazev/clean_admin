<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Orders;
use App\Entity\Goods;

class OrderIdController extends AbstractController
{
    /**
     * @Route("/order/{id}", name="order", requirements={"id"="\d+"})
     */
    public function index($id = false)
    {

      $repository = $this->getDoctrine()->getRepository(Orders::class);
      if($id){
        $order = $repository->find($id);
        $result_order = $order->getOrder();
        $result_order['sum'] = 0;

        $repository_goods = $this->getDoctrine()->getRepository(Goods::class);
        foreach ($result_order['goods'] as $key => $value) {
          $result_order['goods'][$key]['good'] = $repository_goods->find($value['id'])->getGood();
          $result_order['sum'] += $result_order['goods'][$key]['good']['price'] * $result_order['goods'][$key]['amount'];
        }
        return $this->render('order_id/index.html.twig', [
            'controller_name' => 'OrderController',
            'order' => $result_order,
            'name_page' => "order"
          ]);
      }else{
          $order = $repository->findAll();
          return $this->render('order/index.html.twig', [
              'controller_name' => 'OrderController',
              'orders_array' => array('order' => $order),
              'name_page' => "order"
          ]);
      }
    }
}
