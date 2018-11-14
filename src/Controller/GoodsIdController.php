<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GoodsIdController extends AbstractController
{
    /**
     * @Route("/goods/id", name="goods_id", requirements={"id"="\d+"})
     */
    public function index()
    {
      return $this->render('goods_id/index.html.twig', [
          'controller_name' => 'GoodsIdController',
          'goods_array' => array('goods' => $goods_array),
          'name_page' => "goods_id"
      ]);
    }
}
