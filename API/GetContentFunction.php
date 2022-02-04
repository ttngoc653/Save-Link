<?php 

if (isset($_POST['act'])) {

	require 'joss_private/link_data_common.php';

	$actName = $_POST['act'];

	if ($actName == "add_new_link") {
		include '../view/AddLink.html';
	} elseif ($actName == "see_list_hidden") {
		$jsonList = (array)json_decode((new LinkDataCommon())->GetVip(),true);
		include '../view/ShowList.php';
	}
}

?>