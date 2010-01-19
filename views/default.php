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
					<ul>
						<?php foreach( $subnavs as $k => $n ): ?>
							<li><a href="<?php echo $n[ "url" ]?>" id="sn_<?php echo $k?>"><?php echo $n[ "title" ]?></a></li>
							<?php endforeach; ?>	
					</ul>
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
				<div class="grid_12">
					<h1>Oh Boy! A Heading!</h1>
				</div>
				<div class="grid_6">
					<h2>Out with the old in with the new</h2>
					<p>Funding for SPARC finished at the end of December 2008. We are now in transition to KT-EQUAL, a new project designed specifically to exploit a decade of investment by EPSRC in ageing and disability research. EPSRC’s EQUAL initiative showed that by keeping researchers close to research users and beneficiaries as well as ensuring that that they were networked to policy makers, major improvements, locally and nationally, could be achieved very quickly. EQUAL has had a significant influence on official regulations, standards, good practice and, importantly, expectations about the quality of the built environment, about the design of products and systems, and about the support which information technologies can provide to older and disabled people, in good and in poor health.</p>
				</div>
				<div class="grid_6">
					<h2>Growing confidence</h2>
					<p>Through the EQUAL Network and more recently SPARC (funded jointly by EPSRC and BBSRC), researchers throughout the UK have become familiar with the realities of growing older, frailty and disability. They know that these do not respect the boundaries of the scientific disciplines. Seeking out solutions, improving quality of life and wellbeing, requires multidisciplinary research teams, engagement with the many organisations and agencies which work with older and disabled people, and recognising the preferences, knowledge and expertise of older and disabled people and their carers.</p>

					<p>Over the last seven years, EQUAL and SPARC have introduced many new scientists to the exciting challenges of ageing research, and have secured their long-term commitment to the area. They have helped to build a superb rapport across many different communities of stakeholders and interest groups, by showing that ageing and disability research can and does make a difference to the lives of people. This has resulted in an incredible level of support, interest and encouragement in this next stage of getting research into practice. </p>
				</div>
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
