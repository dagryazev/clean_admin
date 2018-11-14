<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Response;
/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $phone;

    /**
     * @ORM\Column(type="text")
     */
    private $promo;

    /**
     * @ORM\Column(type="json_array")
     */
    private $address;

    /**
     * @ORM\Column(type="json_array")
     */
    private $date_get;

    /**
     * @ORM\Column(type="json_array")
     */
    private $date_return;

    /**
     * @ORM\Column(type="boolean")
     */
    private $express;

    /**
     * @ORM\Column(type="text")
     */
    private $comment;

    /**
     * @ORM\Column(type="json_array")
     */
    private $goods;

    /**
     * @ORM\Column(type="boolean")
     */
    private $urgency;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPromo(): ?string
    {
        return $this->promo;
    }

    public function setPromo(string $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDateGet()
    {
        return $this->date_get;
    }

    public function setDateGet($date_get): self
    {
        $this->date_get = $date_get;

        return $this;
    }

    public function getDateReturn()
    {
        return $this->date_return;
    }

    public function setDateReturn($date_return): self
    {
        $this->date_return = $date_return;

        return $this;
    }

    public function getExpress(): ?bool
    {
        return $this->express;
    }

    public function setExpress(bool $express): self
    {
        $this->express = $express;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getGoods()
    {

        $array_goods = array_filter($this->goods['goods'], function($element) {
            return is_array($element);
        });
        // foreach ($array_goods as $key => $value) {
        //   $array_goods[$key]['good'] = $this->getDoctrine()->getRepository(Goods::class)->getGood($value['id']);
        // }
        // $repository = $this->getDoctrine()->getRepository(Orders::class)->find();

        return $array_goods;
    }

    public function setGoods($goods): self
    {
        $this->goods = $goods;

        return $this;
    }

    public function getUrgency(): ?bool
    {
        return $this->urgency;
    }

    public function setUrgency(bool $urgency): self
    {
        $this->urgency = $urgency;

        return $this;
    }

    public function getOrder(int $id = 0) :array
    {
        // var_dump($this->goods);
      return [
        "id" => $this->getId(),
        "phone" => $this->getPhone(),
        "promo" => $this->getPromo(),
        "address" => $this->getAddress(),
        "date_get" => $this->getDateGet(),
        "date_return" => $this->getDateReturn(),
        "express" => $this->getExpress(),
        "comment" => $this->getComment(),
        "goods" => $this->getGoods(),
        "urgency" => $this->getUrgency()
      ];
    }
}
