<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title><?php echo $title ? $title . " | " : null; ?><?php echo $page_title ?></title>
	<base href="http://<?php echo HOST?><?php echo BASE_HREF?>/">
	<link rel="stylesheet" href="css_lib/screen.css" />
	<link rel="stylesheet" href="css_lib/plugins/buttons/screen.css" />
	<link rel="stylesheet" href="css/hci1.css" />
	<script type="text/javascript" src="js_lib/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/home.js"></script>
	<!--[if IE]>
	<script type="text/javascript" src="js_lib/html5enable.js"></script>
	<![endif]-->
</head>
<body>
    <div class="container">
    
	<h1><a href="home"><?php echo $page_title ?></a></h1>
	<hr />
	<div class="span-14 prepend-1 colborder">
		<?php if( isset( $title )): ?>
		<h2><?php echo $title?></h2>
		<?php endif; ?>
		<?php if(isset( $info )): ?>
		<div id="info">
			<?php echo $info ?>		
		</div>
		<?php endif; ?>
		<div id="body">
			<?php
			if( isset( $subview ) )
			{
				include SITE_ROOT . DSEP . "views" . DSEP . "subviews" . DSEP . $subview . ".php";
			}
			?>
			<?php echo $body ?>
		</div>
	
	</div>
	<div class="span-8 last">
	<p><label for="article_search">Search Articles</label><br/>
		<input type="text" id="article_search" /></p>
	<div id="results"></div>
	</div>
    </div>
</body>
</html>