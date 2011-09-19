<?php

class Tbestselling extends templates {
	var $themetemplate = "global2";
	function main_body() {
		$html = $this->rtheme("store");
		$ht['html'] = "";
		$ht['url']	= "http://astore.amazon.com/topworson-20";
		$cat=action(2);
		if($cat!="") {
			$ht['url'].="?_encoding=UTF8&node=".$cat;
		}
		
		echo $this->rvar($html,$ht);
	}
}

?>