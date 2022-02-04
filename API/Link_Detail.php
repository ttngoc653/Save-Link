<?php
if (isset($_POST['id'])) {
	require 'joss_private/link_data_common.php';
	echo (new LinkDataCommon())->GetByDateAdded($_POST['id']);
} else {
	echo "null";
}

?>