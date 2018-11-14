<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Categorii;
use App\Entity\Goods;

class ActionController extends AbstractController
{
    /**
     * @Route("/action/", name="action")
     */
    public function index( Request $request )
    {
      $get_parametrs = $request->query->all();

      switch($get_parametrs['type']){
        case 'addcategory':
          $em = $this->getDoctrine()->getManager();

          $category = new Categorii();
          $category->setTitle($get_parametrs['title']);
          $category->setDescription( $get_parametrs['description']);

          $em->persist($category);

          $em->flush();
          $result_json = array('success' => "Категория успешно добавлена", "debug" => $category->getId());
          break;

        case "updatecategory":
          $em = $this->getDoctrine()->getManager();
          $category = $em->getRepository(Categorii::class)->find($get_parametrs['id']);

          $category->setTitle($get_parametrs['title']);
          $category->setDescription( $get_parametrs['description']);

          $em->flush();
          $result_json = array('success' => "Категория успешно изменена", "debug" => $category->getId());
          break;


        case 'addgood':
          $em = $this->getDoctrine()->getManager();

          $goods = new Goods();
          $goods->setTitle($get_parametrs['title']);
          $goods->setCategory( $get_parametrs['category']);
          $goods->setTimeClean( $get_parametrs['time_clean']);
          $goods->setPrice( $get_parametrs['price']);
          $goods->setOldPrice( $get_parametrs['old_price']);
          $goods->setUnit( $get_parametrs['unit']);

          $em->persist($goods);

          $em->flush();
          $result_json = array('success' => "Товар успешно добавлен", "debug" => $goods->getId());
          break;

        case "updategood":
          $em = $this->getDoctrine()->getManager();
          $goods = $em->getRepository(Goods::class)->find($get_parametrs['id']);

          $goods->setTitle($get_parametrs['title']);
          $goods->setCategory( $get_parametrs['category']);
          $goods->setTimeClean( $get_parametrs['time_clean']);
          $goods->setPrice( $get_parametrs['price']);
          $goods->setOldPrice( $get_parametrs['old_price']);
          $goods->setUnit( $get_parametrs['unit']);

          $em->flush();
          $result_json = array('success' => "Товар успешно изменен", "debug" => $goods->getId());
          break;

        default:

      }
      $request->getSession()
              ->getFlashBag()
              ->add('notice', 'success');
          $referer = $request->headers->get('referer');

        return $this->redirect($referer);
    }
}
