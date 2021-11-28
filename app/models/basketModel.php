<?php

namespace app\models;

class basketModel extends \app\vendor\Model
{

	public function index()
	{
		$userId = $this->sessions->getSession('USER')['id'];
		$isUnpaidOrder = $this->checkUnpaidOrder($userId);
		if(count($isUnpaidOrder) == 0)
		{
			return [
				'status' => true,
				'data' => []
			];
		}else
		{
			$allBasket = $this->getAllBasket($isUnpaidOrder[0]['id']);
			if($allBasket['status'])
			{
				$allBasket['items'] = $this->checkDoubleProducts($allBasket['data']);
				$allBasket['basketPrice'] = $this->getBasketPrice($allBasket['items']);
				$allBasket['basketPrice']['id'] = $isUnpaidOrder[0]['id'];
				unset($allBasket['data']);
				return $allBasket;
			}else
			{
				return [];
			}
		}
	}

	public function getBasketPrice(array $basket) : array
	{
		$sum = 0;
		foreach($basket as $product)
		{
			$sum += str_replace(' ', '', $product['cost']);
		}
		return [
			'sum' => $sum,
			'delivery' => $sum + 500
		];
	}

	public function checkDoubleProducts(array $data) : array
	{
		$arDoubles = [];
		foreach ($data as $key => $item)
		{
			if(in_array($item['id'], $arDoubles))
			{
				$doubleKey = array_keys($arDoubles, $item['id'])[0];
				$data[$doubleKey]['count']++;
				$cost = str_replace(' ', '', $data[$doubleKey]['cost']);
				$cost = $cost + $cost;
				$data[$doubleKey]['cost'] = $cost;
				unset($data[$key]);
			}else
			{
				$arDoubles[$key] = $item['id'];
			}
		}
		return $data;
	}

	public function getAllBasket(int $id) : array
	{
		$sql = "SELECT * FROM baskets bs JOIN products pr ON bs.product = pr.id AND bs.order = :id";
		$response = $this->db->execPDO($sql, [$id]);
		return $response;
	}
	
	public function setProduct($arParams) : void
	{
		$productId = $arParams['int'];
		$userId = $this->sessions->getSession('USER')['id'];
		
		//Сначала следует узнать есть ли у юзера order который еще не оплачен
		//Если есть то эту корзину прицепим к этому заказу
		//Если нет то создадим
		$isUnpaidOrder = $this->checkUnpaidOrder($userId);
		if(count($isUnpaidOrder) == 0)
		{
			//Создаем заказ
			$this->createOrder($userId);
		}else
		{
			//Цепляем продукт к заказу
			$this->createBasket($isUnpaidOrder[0]['id'], $productId);
		}
		header('Location: /basket/');
		die();
	}

	public function checkUnpaidOrder(int $id) : array
	{
		$sql = "SELECT * FROM `orders` WHERE `user` = :id AND `isPayed` = 0";
		$response = $this->db->execPDO($sql, [$id]);
		if($response['data'])
		{
			return $response['data'];
		}
		return [];
	}

	public function createOrder(int $id) : void
	{
		$sql = "INSERT INTO `orders`(`user`) VALUES(:id)";
		$response = $this->db->execPDO($sql, [$id]);
	}

	public function createBasket(int $id, int $product) : void
	{
		$sql = "INSERT INTO `baskets`(`order`, `product`) VALUES(:id, :product)";
		$response = $this->db->execPDO($sql, [$id, $product]);
	}

	public function delete(array $arParams) : bool
	{
		$id = $arParams['int'];
		$userId = $this->sessions->getSession('USER')['id'];
		$orderId = $this->checkUnpaidOrder($userId)[0]['id'];
		$sql = "DELETE FROM `baskets` WHERE `order` = :order AND `product` = :product";
		$response = $this->db->execPDO($sql, [$orderId, $id]);
		if($response['status'])
		{
			return true;
		}
		return false;
	}

	public function pay(array $arParams) : bool
	{
		$id = $arParams['int'];
		$sql = "UPDATE `orders` SET `isPayed` = 1 WHERE `id` = :id";
		$response = $this->db->execPDO($sql, [$id]);
		if($response['status'])
		{
			return true;
		}
		return false;
	}
}