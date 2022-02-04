<?php
require 'joss_private/link_data_common.php';

if (isset($_POST['VIP']) && $_POST['VIP'] == md5('HioH'.date("Ymd").'JosS')) {
	//echo (new LinkDataCommon())->GetVip();
} else {
	echo (new LinkDataCommon())->GetNormal();
}
?>