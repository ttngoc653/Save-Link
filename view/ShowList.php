<?php 
if (!isset($jsonList)) {
	require '../API/joss_private/link_data_common.php';
	$jsonList = (array)json_decode((new LinkDataCommon())->GetNormal(),true);
} 
?>

<div class="pin_container" id="listFilm">
	<?php
	foreach($jsonList as $item)
	{
		$detailImage = $item['image'];
		$detailTitle = $item['name'];
		$detailActor = $item['actor'];
		$detailCountry = $item['country'];
		$detailDate = $item['datetime_add'];
		echo '<div class="custom_card">';
		include 'ItemLink.php';
		echo '</div>';
	}  
	?>
</div>
<!-- <script src="index.js" type="text/javascript" charset="utf-8" async defer></script> -->
<script type="text/javascript" charset="utf-8" async defer>
	document.getElementById("content").innerHTML += getShowDetailItem();

	$("<link/>", {
		rel: "stylesheet",
		type: "text/css",
		href: "index.css"
	}).appendTo("head");
</script>
