<?php

declare(strict_types=1);

namespace Core\DB;

use mysqli;

class DbConnection
{
	/**
	 * @return bool|mysqli|null
	 * @throws \Exception
	 */
	function getDbConnection(): bool|mysqli|null
	{
		static $connection = null;

		if ($connection === null)
		{
			$dbHost = option('DB_HOST');
			$dbUser = option('DB_USER');
			$dbPassword = option('DB_PASSWORD');
			$dbName = option('DB_NAME');

			$connection = mysqli_init();

			$connected = mysqli_real_connect($connection, $dbHost, $dbUser, $dbPassword, $dbName);

			if (!$connected)
			{
				$error = mysqli_connect_errno() . ':' . mysqli_connect_error();
				throw new \RuntimeException($error);
			}

			$encodingResult = mysqli_set_charset($connection, 'utf8');

			if (!$encodingResult)
			{
				throw new \RuntimeException(mysqli_error($connection));
			}
		}

		return $connection;
	}
}