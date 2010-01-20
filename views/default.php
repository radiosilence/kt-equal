<!DOCTYPE html>
<html>
	<head>
		<base href="http://<?php echo HOST?><?php echo BASE_HREF ?>/">
		<title><?php echo $title?> | KT-EQUAL</title>
		<link rel="stylesheet" type="text/css" href="css_lib/960.css" />
		<link rel="stylesheet" type="text/css" href="css/hci1.css" />
		<script src="js_lib/jquery-1.4.js"></script>
		<script src="js/home.js"></script>
	</head>
	<body id="<?php echo $page?>">
		<div id="header">
			<div class="container_12">
				<div class="grid_3" id="logo">
					<a href="<?php echo BASE_HREF ?>"><img src="img/logo.png" alt="Logo" title="KT-EQUAL" /></a>
				</div>
				<div class="grid_9" id="tabs">
					<div  id="search" class="grid_4 prefix_6">
						<input type="text" class="search_inactive" id="article_search" name="article_search" value="Search"/>
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
				<div id="results" class="grid_3 prefix_6"></div>
			</div>
			<div class="container_12" id="infobox">
				<div class="grid_4">
					<img src="<?php echo $s_img?>" />
				</div>
				<div class="grid_8">
					<?php echo $s_intro?>
				</div>
			</div>
			<div class="container_12">
				<div class="grid_12" id="subnav">
						<?php $tmp = 1; foreach( $subnavs as $k => $n ): ?>
							<a href="<?php echo $n[ "url" ]?>" id="sn_<?php echo $k?>"<?php echo ( $cur_url == $n[ "url" ] ? " class=\"active\"" : null )?>><?php echo $n[ "title" ]?></a><?php echo ( $tmp++  < count( $subnavs ) ? "&nbsp;&nbsp;&bull;&nbsp;&nbsp;" : null );?>
						<?php endforeach; ?>	
				</div>
			</div>
			<div class="container_12" id="content">
				<article>
					<div class="grid_12">
						<hgroup>
							<h1><?php echo $title?></h1>
						</hgroup>
					</div>
					<?php if( $include ):
						include $include; ?>
					<?php elseif( $content[ "markdown" ] ): ?>
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
						<li><a href="home">News</a></li>
					</ul>
				</div>
				<div class="grid_3">
					<ul>
						<li><a href="about-us/other-contact-information.html">Contact Us</a></li>
					</ul>
				</div>
				<div class="grid_3">
					<ul>
						<li><a href="mailto:webmaster@kt-equal.org.uk">E-Mail Webmaster</a></li>
					</ul>
				</div>
				<div class="grid_3">
					<ul>
						<li><a href="help/site-map.html">Site Map</a></li>
					</ul>
				</div>
			</div><br/>
			
			<div class="container_12">
				<div class="grid_12" id="copyleft">
					Website &copy; KT-EQUAL 2010, Property of James E. Cleveland, Karl Sainz-Martinez &amp; Richard Hughes
				</div>
		</div>
	</body>
</html>
