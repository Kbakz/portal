<?php
	class Site{
		public static function selectedMenu($par){
			$url = explode('/',@$_GET['url'])[0];
			if($url == $par)
				echo 'class="selected"';
		}
	}
?>