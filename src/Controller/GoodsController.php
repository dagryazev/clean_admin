<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Goods;
use App\Entity\Categorii;

class GoodsController extends AbstractController
{
    /**
     * @Route("/goods/{id}", name="goods", requirements={"id"="\d+"})
     */
    public function index($id = false)
    {
      $repository_goods = $this->getDoctrine()->getRepository(Goods::class);

      if($id){
        $goods_array = $repository_goods->find($id)->getGood();
        $category_array = $this->getDoctrine()->getRepository(Categorii::class)->findAll();
        return $this->render('goods_id/index.html.twig', [
            'controller_name' => 'GoodsIdController',
            'goods_array' => $goods_array,
            'category_array' => $category_array,
            'name_page' => "goods_id"
        ]);
      }else{
        foreach ($repository_goods->findAll() as $key => $value) {
          $goods_array[$key] = $value->getGood();
          $goods_array[$key]['category'] = $this->getDoctrine()->getRepository(Categorii::class)->find( $goods_array[$key]['category'] )->getCategory();
        }
        return $this->render('goods/index.html.twig', [
          'controller_name' => 'GoodsController',
          'goods_array' => array('goods' => $goods_array),
          'name_page' => "goods"
        ]);
      }
    }
}
