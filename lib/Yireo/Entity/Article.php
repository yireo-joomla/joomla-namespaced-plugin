<?php
namespace Yireo\Entity;

use Yireo\Database\DatabaseInterface;

/**
 * Class Article
 *
 * @package Yireo\Entity
 */
class Article
{
	/**
	 * @var DatabaseInterface
	 */
	private $db;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * Article constructor.
	 *
	 * @param DatabaseInterface $db
	 */
	public function __construct(DatabaseInterface $db)
	{
		$this->db = $db;
	}

	/**
	 * @param integer $id
	 *
	 * @return object
	 */
	public function load($id)
	{
		$db     = $this->db;
		$object = $db->loadRowById('#__content', $id);

		foreach (get_object_vars($object) as $name => $value)
		{
			$this->$name = $object->$name;
		}
	}

	/**
	 * Return the title of this object
	 */
	public function getTitle()
	{
		return $this->title;
	}
}