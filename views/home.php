<!DOCTYPE html>
<html>
<head>
	<title>HCI Website</title>
	<base href="http://<?php echo HOST?><?php echo BASE_HREF?>/">
	<link rel="stylesheet" href="css_lib/screen.css" type="text/css" />
	<link rel="stylesheet" href="css_lib/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
	<script type="text/javascript" src="js_lib/jquery-1.3.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
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
					list.append("<li><h4><a href=\"articles/"+item["seo_url"]+"\" class=\"title\">"+item["title"]+"</a></h4>"+
						"<blockquote>\u201C"+item["excerpt"]+"\u201D</blockquote></li>");	
					}
					else
					{
					list.append("<li><h4><a href=\"articles/"+item["seo_url"]+"\" class=\"title\">"+item["title"]+"</a></h4></li>");
					}
					item["excerpt"] =  null;
					
				});
			});
		}
	});

	</script>
	<style>
	
	.term {
		background-color: yellow;
		color: black;
	}
	.title_term {
		background-color: yellow;
	}
	.title {
		font-weight: bold;
		font-size: 12pt;
	}
	</style>
</head>
<body>
    <div class="container">
	<h1>Look at that title</h1>
	<hr />
	<h2>Search</h2>
	<p><label for="article_search">Search Article</label><br/>
		<input type="text" id="article_search" /></p>
	<hr/>
	<div id="results">
	
	</div>
    </div>
</body>
</html>