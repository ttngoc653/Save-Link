<?php
require 'include.php';

/**
 *
 */
class LinkDataQuery
{

	function CheckAndCreateTable()
	{
		$queryCreateTable =
'CREATE TABLE IF NOT EXISTS `data_link` (
  `name` varchar(255) NOT NULL,
  `link` varchar(255)  NOT NULL,
  `image` varchar(255)  NOT NULL,
  `actor` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `content` text,
  `premium` tinyint(1) NOT NULL DEFAULT 1,
  `datetime_add` varchar(255) NOT NULL,
  `hiden` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`link`),
  UNIQUE KEY `image` (`image`),
  UNIQUE KEY `name` (`name`)
);';

		$general_table = new GeneralQuery();
		$general_table->CreateTable('data_link',$queryCreateTable);
	}

	function GetAllMinimum()
	{
		$this->CheckAndCreateTable();

		$connection = (new Database())->connect();

		$stmt = $connection->prepare('SELECT `name`, `image`, `actor`, `country`, `premium`, `datetime_add` FROM `data_link` ORDER BY `datetime_add`');
		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	function GetNormal()
	{
		$this->CheckAndCreateTable();

		$connection = (new Database())->connect();

		$stmt = $connection->prepare('SELECT `name`, `image`, `actor`, `country`, `datetime_add` FROM `data_link` WHERE `premium`=0 ORDER BY `datetime_add`');
		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	function GetPremium()
	{
		$this->CheckAndCreateTable();

		$connection = (new Database())->connect();

		$stmt = $connection->prepare('SELECT `name`, `image`, `actor`, `country`, `datetime_add` FROM `data_link` WHERE `premium`=1 ORDER BY `datetime_add`');
		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	function GetFromDateAdded($date)
	{
		$this->CheckAndCreateTable();

		$connection = (new Database())->connect();
		$stmt = $connection->prepare('SELECT `name` title, `link`, `image` avatar, `actor`, `country`, `content`, `premium`, `datetime_add` FROM `data_link` WHERE `datetime_add` = ? LIMIT 1');

		$stmt->bindParam(1, $date);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	function GetFromDateAdded2($date)
	{
		$this->CheckAndCreateTable();

		$connection = (new Database())->connect();
		$stmt = $connection->prepare('SELECT `name` title, `link`, `image` avatar, `actor`, `country`, `content` FROM `data_link` WHERE `datetime_add` = ? LIMIT 1');

		$stmt->bindParam(1, $date);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	function GetContentFromDateAdded($date)
	{
		$this->CheckAndCreateTable();

		$connection = (new Database())->connect();
		$stmt = $connection->prepare('SELECT `link`, `content` FROM `data_link` WHERE `datetime_add` = ? LIMIT 1');

		$stmt->bindParam(1, $date);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	function GetFromName($name)
	{
		$this->CheckAndCreateTable();

		$connection = (new Database())->connect();
		$stmt = $connection->prepare('SELECT `name`, `link`, `image`, `actor`, `country`, `content`, `premium`, `datetime_add` FROM `data_link` WHERE `name` = ? LIMIT 1');

		$stmt->bindParam(1, $name);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	function Add($name, $listactor, $link, $image, $country, $content, $dateadd, $haspremium)
	{
		$this->CheckAndCreateTable();

		$connection = (new Database())->connect();
		$stmt = $connection->prepare('INSERT INTO `data_link`(`name`, `link`, `image`, `actor`, `country`, `content`, `premium`, `datetime_add`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

		$stmt->bindParam(1, $name);
		$stmt->bindParam(2, $link);
		$stmt->bindParam(3, $image);
		$stmt->bindParam(4, $listactor);
		$stmt->bindParam(5, $country);
		$stmt->bindParam(6, $content);
		$stmt->bindParam(7, $haspremium);
		$stmt->bindParam(8, $dateadd);

		$stmt->execute();

		$results = $connection->lastInsertId();

		return $results;
	}

	function Hide($dateadd, $hasHide = 1)
	{
		$this->CheckAndCreateTable();

		$connection = (new Database())->connect();
		$stmt = $connection->prepare('UPDATE `data_link` SET `hiden` = ? WHERE `datetime_add` = ?');

		$stmt->bindParam(1, $hasHide);
		$stmt->bindParam(2, $dateadd);

		$stmt->execute();
	}

	function GetCountries()
	{
		$this->CheckAndCreateTable();

		$connection = (new Database())->connect();
		$stmt = $connection->prepare('SELECT DISTINCT `country` FROM `data_link`');

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	function GetActors()
	{
		$this->CheckAndCreateTable();

		$connection = (new Database())->connect();
		$stmt = $connection->prepare('SELECT DISTINCT `actor` FROM `data_link`');

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	function ExistName($name='')
	{
		# code...
	}

	function ExistImage($name='')
	{
		# code...
	}

	function ExistLink($name='')
	{
		# code...
	}
}
?>