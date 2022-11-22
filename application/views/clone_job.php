<?php 

	$link_to_direct = array();

	$link_to_direct[] = base_url();

	foreach($catalog_list as $row){
		if($row->url_status == '0'){
			$link_to_direct[] = base_url($row->alias.'-cat'.$row->id.'.html');
		}

		foreach($row->subs as $subs){
			if($subs->url_status == '0'){
				$link_to_direct[] = base_url($subs->alias.'-cat'.$subs->id.'.html');
			}
			foreach($subs->subss as $subss){
				if($subss->url_status == '0'){
					$link_to_direct[] = base_url($subss->alias.'-cat'.$subss->id.'.html');
				}
			}
		}
	}

	foreach($news_list as $row){
		$link_to_direct[] = base_url($row->alias.'-news'.$row->id.'.html');
	}

	shuffle($link_to_direct);
	echo $link_to_direct['0'];
?>

<iframe src="<?php echo $link_to_direct['0']; ?>"></iframe>

<script>
	setTimeout(function(){
	   window.location.reload(1);
	}, 10000);
</script>