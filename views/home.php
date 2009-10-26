<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $title ?></title>
	<base href="http://<?php echo HOST?><?php echo BASE_HREF?>/">
	<link rel="stylesheet" href="css_lib/screen.css" type="text/css" />
	<link rel="stylesheet" href="css_lib/hci1.css" type="text/css" />
	<script type="text/javascript" src="js_lib/jquery-1.3.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {

		var myFile = document.location.toString();
		
		if( myFile.match('#') )
		{ // the URL contains an anchor
			// click the navigation item corresponding to the anchor
			var argz = {};
			var myAnchor = myFile.split('#')[1];
			$.each( myAnchor.split( ";" ), function( k, v ){
				argz[v.split( ":" )[0]] = v.split( ":" )[1];
			});
			$( "#article_search" ).attr( "value", argz[ "s" ] );
			$( "#search_link" ).attr( "href", "index#s:"+argz[ "s" ] );
		}

		searchUpdate();
		$( "#article_search" ).keyup( searchUpdate );
		

		function searchUpdate(){
			var term = $( "#article_search" ).attr( "value" );
			$( "#term" ).text( term );
			$.getJSON( "ajaj/article/search/q:"+term, function( data ){
				var list = $("#results").html('<ul></ul>').find('ul');

				$.each( data, function( i, item ){
					if( item["excerpt"] )
					{
					list.append("<li><h6><a href=\"articles/"+item["seo_url"]+"#s:"+term+"\" class=\"title\">"+item["title"]+"</a></h6>"+
						"<blockquote>\u201C"+item["excerpt"]+"\u201D</blockquote></li>");	
					}
					else
					{
					list.append("<li><h6><a href=\"articles/"+item["seo_url"]+"#s:"+term+"\" class=\"title\">"+item["title"]+"</a></h6></li>");
					}
					item["excerpt"] =  null;
					
				});
			});
		}
	});

	</script>
</head>
<body>
    <div class="container">
	<h1><?php echo $title ?></h1>
	<hr />
	
	<div class="span-15 prepend-1 colborder">	
	<?php echo $body ?>

	<p><a href="#" id="search_link">&lt;&lt; Return Home</a></p>
	</div>
	<div class="span-7 last">
	<p><label for="article_search">Search Articles</label><br/>
		<input type="text" id="article_search" /></p>
	<div id="results"></div>
	</div>
    </div>
</body>
</html>