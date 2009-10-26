<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $title?></title>
	<base href="http://<?php echo HOST?><?php echo BASE_HREF?>/">
	<link rel="stylesheet" href="css_lib/screen.css" type="text/css" />
	<link rel="stylesheet" href="css_lib/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
	<script type="text/javascript" src="js_lib/jquery-1.3.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		var myFile = document.location.toString();
		
		if( myFile.match('#') )
		{
			var argz = {};
			var myAnchor = myFile.split('#')[1];
			$.each( myAnchor.split( ";" ), function( k, v ){
				argz[v.split( ":" )[0]] = v.split( ":" )[1];
			});
			console.log( argz );
			$( "#search_link" ).attr( "href", "index#s:"+argz[ "s" ] );
		}

	});
	</script>
</head>
<body>
    <div class="container">
	<h1><?php echo $title?></h1>
	<hr />
	<p><a href="#" id="search_link">&lt;&lt; Return to Search</a></p>
	<?php echo $body ?>
    </div>
</body>
</html>