<!DOCTYPE html>
<html>
	<head>
		<base href="http://<?php echo HOST?><?php echo BASE_HREF ?>/">
		<title><?php echo $title?> | KT-EQUAL</title>
		<link rel="stylesheet" type="text/css" href="css_lib/960.css" />
		<link rel="stylesheet" type="text/css" href="css/hci1.css" />
		<script src="js_lib/jquery-1.4.js"></script>
	</head>
	<body id="<?php echo $page?>">
		<div id="header">
			<div class="container_12">
				<div class="grid_3" id="logo">
					<a href="<?php echo BASE_HREF ?>"><img src="img/logo.png" alt="Logo" title="KT-EQUAL" /></a>
				</div>
				<div class="grid_9" id="tabs">
					<div class="grid_3 prefix_6" id="search">
						<input type="text" name="search" value="Search"/>
					</div>
					<div id="nav">
						<ul>
							<?php foreach( $navs as $n => $nav ): ?>
							<li><a href="<?php echo $n?>" id="n_<?php echo $n?>"><?php echo $nav?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="main">
			<div class="container_12">
				<div class="grid_12" id="subnav">
						<?php $tmp = 1; foreach( $subnavs as $k => $n ): ?>
							<a href="<?php echo $n[ "url" ]?>" id="sn_<?php echo $k?>"><?php echo $n[ "title" ]?></a><?php echo ( $tmp++  < count( $subnavs ) ? "&nbsp;&nbsp;&bull;&nbsp;&nbsp;" : null );?>
						<?php endforeach; ?>	
				</div>
			</div>
			<div class="container_12" id="infobox">
				<div class="grid_4">
					<img src="<?php echo $s_img?>" />
				</div>
				<div class="grid_8">
					<?php echo $s_intro?>
				</div>
			</div>
			<div class="container_12" id="content">
				<article>
					<div class="grid_12">
						<hgroup>
							<h1><?php echo $title?></h1>
						</hgroup>
					</div>
					<?php if( $content[ "markdown" ] ): ?>
					<div class="grid_12">
						<?php echo $content[ "markdown" ]?>
					</div>
					<?php else:
						echo $content[ "html" ]; ?>
					<?php endif; ?>
					
				</article>
			</div>
		</div>
		<div id="footer">
			<div class="container_12">
				<div class="grid_3">
					<ul>
						<li><a href="#">Site Map</a></li>
						<li><a href="#">Contact Us!</a></li>
						<li><a href="#">Growing Opportunities</a></li>
						<li><a href="#">Why we are so boring</a></li>
						<li><a href="#">Administrative Section</a></li>
						<li><a href="#">Log In</a></li>
						<li><a href="#">Yanqui UXO</a></li>
						<li><a href="#">Godpseed You! Black emperorr</a></li>
						<li><a href="#">Merciless</a></li>
					</ul>
				</div>
				<div class="grid_3">
					<ul>
						<li><a href="#">Site Map</a></li>
						<li><a href="#">Contact Us!</a></li>
						<li><a href="#">Growing Opportunities</a></li>
						<li><a href="#">Why we are so boring</a></li>
						<li><a href="#">Administrative Section</a></li>
						<li><a href="#">Log In</a></li>
						<li><a href="#">Yanqui UXO</a></li>
						<li><a href="#">Godpseed You! Black emperorr</a></li>
						<li><a href="#">Merciless</a></li>
					</ul>
				</div>
				<div class="grid_3">
					<ul>
						<li><a href="#">Site Map</a></li>
						<li><a href="#">Contact Us!</a></li>
						<li><a href="#">Growing Opportunities</a></li>
						<li><a href="#">Why we are so boring</a></li>
						<li><a href="#">Administrative Section</a></li>
						<li><a href="#">Log In</a></li>
						<li><a href="#">Yanqui UXO</a></li>
						<li><a href="#">Godpseed You! Black emperorr</a></li>
						<li><a href="#">Merciless</a></li>
					</ul>
				</div>
				<div class="grid_3">
					<ul>
						<li><a href="#">Site Map</a></li>
						<li><a href="#">Contact Us!</a></li>
						<li><a href="#">Growing Opportunities</a></li>
						<li><a href="#">Why we are so boring</a></li>
						<li><a href="#">Administrative Section</a></li>
						<li><a href="#">Log In</a></li>
						<li><a href="#">Yanqui UXO</a></li>
						<li><a href="#">Godpseed You! Black emperorr</a></li>
						<li><a href="#">Merciless</a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>
