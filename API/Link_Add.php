<?php
if (isset($_POST['name'], $_POST['actors'], $_POST['link'], $_POST['image'], $_POST['country'], $_POST['description'], $_POST['key']))
{
	require 'joss_private/link_data_common.php';

	if ($_POST['key'] == "password-save-normal") {
		echo (new LinkDataCommon())->AddNormal($_POST['name'], $_POST['actors'], $_POST['link'], $_POST['image'], $_POST['country'], $_POST['description'], date("Y-m-d H:i:s"), '0');
	} elseif ($_POST['key'] == "password-save-hidden") {
		echo (new LinkDataCommon())->AddVip($_POST['name'], $_POST['actors'], $_POST['link'], $_POST['image'], $_POST['country'], $_POST['description'], date("Y-m-d H:i:s"), '1');
	} else {
		echo "Key ".$_POST['key']." invalid.";
		echo "\n";
		echo "Date time current in server: ".date("Y/m/d H:i:s");
	}
} else {
	echo "null";
}
?>