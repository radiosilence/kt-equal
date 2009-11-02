$(document).ready(function() {

	var myFile = document.location.toString();
	
	if( myFile.match('#') )
	{
		var argz = {};
		var myAnchor = myFile.split('#')[1];
		argz = loadAnchor( myAnchor );
		$( "#article_search" ).attr( "value", argz[ "s" ] );
	}
	
	window.curAnchor = myAnchor;
	anchorUpdate( window.curAnchor );
	
	function loadAnchor( anc )
	{
		if( anc )
		{
			$.each( anc.split( ";" ), function( k, v ){
				argz[v.split( ":" )[0]] = v.split( ":" )[1];
			});
			return argz;
		}
		else
		{
			return {};
		}
	}
	
	function saveAnchor( argz )
	{
		i = 0;
		var args = [];
		$.each( argz, function( k, v ){
			args[i] = k+":"+v;
			i++;	
		});
		return  args.join( ';' );
	}
	
	function anchorUpdate( anc )
	{	
		$( "#search_link" ).attr( "href", "index#"+anc );
		$( "h1 a" ).attr( "href", "index#"+anc );
		
		$.each( $( "#body ul#articles li h3 a" ), function( artli, art ){
			url = $( this ).attr( "href" ).split( "#" );
			url[1] = anc;
			$( this ).attr( "href", url.join( "#" ) );
		});
	}

	searchUpdate();
	$( "#article_search" ).keyup( searchUpdate );
	
	function searchUpdate(){
		var term = $( "#article_search" ).attr( "value" );
		
		argz = loadAnchor( window.curAnchor );
		argz[ "s" ] = term;
		window.curAnchor = saveAnchor( argz );
		anchorUpdate( window.curAnchor );
		
		$( "#term" ).text( term );
		$.getJSON( "ajaj/article/search/q:"+term, function( data ){
			
			var list = $("#results").html('<ul></ul>').find('ul');

			$.each( data, function( i, item ){
			
				url = "articles/"+item["seo_url"]+"#"+window.curAnchor;
				
				if( item["excerpt"] )
				{
					list.append("<li><h6><a href=\""+url+"\" class=\"title\">"+item["title"]+"</a></h6>"+
					"<blockquote>\u201C"+item["excerpt"]+"\u201D</blockquote></li>");	
				}
				else
				{
					list.append("<li><h6><a href=\""+url+"\" class=\"title\">"+item["title"]+"</a></h6></li>");
				}
				
				item["excerpt"] =  null;
			});
		});
	}
});