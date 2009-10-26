<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?></title>
	<base href="http://<?php echo HOST?><?php echo BASE_HREF?>/">
	<link rel="stylesheet" href="css_lib/screen.css" type="text/css" />
	<link rel="stylesheet" href="css_lib/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
	<script type="text/javascript" src="js_lib/jquery-1.3.2.js"></script>
</head>
<body>
    <div class="container">
	<h1><?php echo $title?></h1>
	<hr />
	<?php echo $body ?>
    </div>
</body>
</html>