<?php

namespace Yireo\Database;

/**
 * Interface DatabaseInterface
 *
 * @package Yireo\Database
 */
interface DatabaseInterface
{
	/**
	 * @param string $table
	 * @param int $id
	 *
	 * @return object
	 */
	public function loadRowById($table, $id);

	/**
	 * @param boolean $isNew
	 *
	 * @return mixed
	 */
	public function getQuery($isNew);

	/**
	 * @param $mixed
	 *
	 * @return mixed
	 */
	public function quoteName($mixed);

	/**
	 * @param \JDatabaseQuery|string $query
	 *
	 * @return \JDatabaseDriver
	 */
	public function setQuery($query);

	/**
	 * @return object
	 */
	public function loadObject();
}