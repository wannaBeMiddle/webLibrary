<?php

namespace app\models;
use \app\vendor\Model;

class mainModel extends Model
{
	public function index() : array
	{
		$sql = "SELECT `books`.`preview`, `books`.`idbook`, `books`.`name` as 'bookname', `books`.`preview_picture`, `books`.`year`, `books`.`pagesCount`, `books`.`rating`, `authors`.* , `langs`.`name` as 'lang', `publishers`.`name` as 'publisher', `address`.*, `readings`.`dateEnd`, `readings`.`users_id` as 'userId' FROM `books` LEFT JOIN `authors` ON `books`.`idbook` = `authors`.`idauthor` LEFT JOIN `langs` ON `books`.`langs_id` = `langs`.`idlang` LEFT JOIN `publishers` ON `books`.`publishers_id` = `publishers`.`idpublisher` LEFT JOIN `address` ON `publishers`.`address_id` = `address`.`idaddress` LEFT JOIN `readings` ON `books`.`idbook` = `readings`.`books_id` AND CURDATE() <= `readings`.`dateEnd`";
		$response = $this->db->execPDO($sql);
		if($response['status'])
		{
			return $response;
		}
		return [
			'status' => false
		];
	}
}