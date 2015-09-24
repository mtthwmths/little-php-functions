<?php
	//begin mathis get last bit of url
	//earl is the current url
	//lastslash and firstslash are the last and first "/" in the url
	//tab will be the last bit of the current url
	$earl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$lastslash = strrpos($earl, "/");
	$firstslash = strpos($earl, "/");
	//if it's not just http://
	if ($lastslash > ($firstslash + 1)) {
		$tab = substr($earl, 0, $lastslash); //removes the trailing slash
		$tab = substr($tab, (strrpos($tab, "/") + 1));
	} else {
		$tab = '';
	}
	//end mathis get last bit of url
?>
