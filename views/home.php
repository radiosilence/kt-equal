<!DOCTYPE html>
<html>
<head>
	<title>HCI Website</title>
	<script type="text/javascript" src="js_lib/jquery-1.3.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$( "#article_search" ).keyup(function(e){
			var term = $(this).attr( "value" );
			$( "#term" ).text( term );
			$.getJSON( "ajaj/article/search/q:"+term, function( data ){
				var list = $("#results").html('<ul></ul>').find('ul');

				$.each( data, function( i, item ){
					list.append('<li><a href="articles/'+item["seo_url"]+'" class="title">'+item["title"]+'</a><br/><p>'+item["excerpt"]+'</p></li>');
				});
			});
		});
	});

	</script>
	<style>
	.term {
		font-weight: bold;
		background-color: yellow;
	}
	.title_term {
		font-weight: bold;
		background-color: yellow;
	}
	.title {
		font-weight: bold;
		font-size: 12pt;
	}
	#results li {
		font-size: 8pt;	
	}
	</style>
</head>
<body>
	<h1>Look at that title</h1>
	<p>Blah blah</p>
	<p>Search Article: <input type="text" id="article_search" /></p>
	<p><label for="term">Search term:</lable><br/><span id="term"></p>
	results:<div id="results">
	
	</div>
</body>
</html>