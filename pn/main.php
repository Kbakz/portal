<?php
	if (isset($_GET['logout'])) {
		Painel::logout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css">
	<title>Painel de controle</title>
</head>
<body>
	<div class="menu-painel">
		<p><i class="fas fa-angle-double-left"></i></p>
	</div><!--menu-painel-->
<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
<script src="https://kit.fontawesome.com/169263c84a.js" crossorigin="anonymous" defer></script>
<script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
</body>
</html>