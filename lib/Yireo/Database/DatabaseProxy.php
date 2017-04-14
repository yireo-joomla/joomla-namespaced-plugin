<?php

namespace Yireo\Database;

/**
 * Class DatabaseProxy
 *
 * @package Yireo\Database
 */
class DatabaseProxy implements DatabaseInterface
{
	/**
	 * @var \JDatabaseDriver
	 */
	private $db;

	/**
	 * DatabaseProxy constructor.
	 *
	 * @param \JDatabaseDriver $db
	 */
	public function __construct(\JDatabaseDriver $db)
	{
		$this->db = $db;
	}

	/**
	 * @param string $table
	 * @param int $id
	 *
	 * @return object
	 */
	public function loadRowById($table, $id)
	{
		$query = $this->getQuery(true);
		$query->select('*');
		$query->from($this->quoteName($table));

		$query->where($this->quoteName('id') . '=' . (int) $id);
		$this->db->setQuery($query);

		return $this->db->loadObject();
	}

	/**
	 * @param boolean $isNew
	 *
	 * @return \JDatabaseQuery
	 */
	public function getQuery($isNew)
	{
		return $this->db->getQuery($isNew);
	}

	/**
	 * @param string $mixed
	 *
	 * @return string
	 */
	public function quoteName($mixed)
	{
		return $this->db->quoteName($mixed);
	}

	/**
	 * @param \JDatabaseQuery|string $query
	 *
	 * @return \JDatabaseDriver
	 */
	public function setQuery($query)
	{
		return $this->db->setQuery($query);
	}

	/**
	 * @return object
	 */
	public function loadObject()
	{
		return $this->db->loadObject();
	}
}