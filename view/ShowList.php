<?php if (!isset($jsonList)): ?>
	<?php $jsonList = (array)json_decode((new LinkDataCommon())->GetNormal()); ?>	
<?php endif ?>

<div class="row" id="listFilm" style="width: 100%; margin: auto;">
	<?php
	foreach($jsonList as $item)
	{
		$detailImage = $item['image'];
		$detailTitle = $item['name'];
		$detailActor = $item['actor'];
		$detailCountry = $item['country'];
		$detailDate = $item['datetime_add'];
		include 'ItemLink.php';
	}  
	?>
</div>
<script type="text/javascript" charset="utf-8" async defer>
	document.getElementById("content").innerHTML += getShowDetailItem();
</script>
