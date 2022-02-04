<?php
require 'include.php';

class LinkDataCommon
{
	function GetAll()
	{
		$my_Query = new LinkDataQuery();

		$result = $my_Query->GetAllMinimum();

		return json_encode($result);
	}

	function GetNormal()
	{
		$my_Query = new LinkDataQuery();

		$result = $my_Query->GetNormal();

		return json_encode($result);
	}
	function GetVip()
	{
		$my_Query = new LinkDataQuery();

		$result = $my_Query->GetPremium();

		return json_encode($result);
	}

	function GetShowing()
	{
		$my_Query = new LinkDataQuery();

		$result = $my_Query->GetShowing();

		return json_encode($result);
	}
	function GetHiding()
	{
		$my_Query = new LinkDataQuery();

		$result = $my_Query->GetHiding();

		return json_encode($result);
	}

	function GetByDateAdded($dateadded)
	{
		$my_Query = new LinkDataQuery();

		$result = $my_Query->GetFromDateAdded2($dateadded);

		if (count($result) == 0)
		{
			return null;
		}
		else
		{
			return json_encode($result[0]);
		}
	}

	function GetContentByDateAdded($dateadded)
	{
		$my_Query = new LinkDataQuery();

		$result = $my_Query->GetContentFromDateAdded($dateadded);

		if (count($result) == 0)
		{
			return null;
		}
		else
		{
			return json_encode($result[0]);
		}
	}

	function GetByName($name)
	{
		$my_Query = new LinkDataQuery();

		$result = $my_Query->GetFromName($name);

		if (count($result) == 0)
		{
			return null;
		}
		else
		{
			return json_encode($result[0]);
		}
	}

	function AddNormal($name, $listactor, $link, $image, $country, $content, $dateadd)
	{
		$my_Query = new LinkDataQuery();

		$result = $my_Query->Add($name, $listactor, $link, $image, $country, $content, $dateadd, 0);

		return $result;
	}

	function AddVip($name, $listactor, $link, $image, $country, $content, $dateadd)
	{
		$my_Query = new LinkDataQuery();

		$result = $my_Query->Add($name, $listactor, $link, $image, $country, $content, $dateadd, 1);

		return $result;
	}

	function Hide($dateadded)
	{
		$my_Query = new LinkDataQuery();

		$my_Query->Hide($dateadded);
	}

	function Show($dateadded)
	{
		$my_Query = new LinkDataQuery();

		$my_Query->Hide($dateadded, 0);
	}

	function Countries()
	{
		$my_Query = new LinkDataQuery();

		$lists = $my_Query->GetCountries();

		$results = array();
		foreach ($lists as $item) {
			$temps = explode(";", $item['country']);
			array_push($results, ...$temps);
		}

		return json_encode($results);
	}

	function Actors()
	{
		$my_Query = new LinkDataQuery();

		$lists = $my_Query->GetActors();

		$results = array();
		foreach ($lists as $item) {
			$temps = explode(";", $item['actor']);
			array_push($results, ...$temps);
		}

		return json_encode($results);
	}
}
?>