$(document).ready(function() {

	searchUpdate();
	$( "#article_search" ).keyup( searchUpdate );
	
	$( "#article_search" ).focus(function(){
		$(this).css('zIndex', 10000);

		if( $(this).attr( "active" ) != "yes" )
		{
			$(this).attr( "value", "" )
				.attr( "active", "yes" )
				.css( "color", "black" );
		}
		$(this).css( "border", "1px solid #31C2D2" );
	});
	
	$( "#article_search" ).blur( function(){
		if( $(this).attr( "value" ) == "" )
		{
			$(this).attr( "value", "Search" )
				.css( "color", "#979797" )
				.attr( "active", "no" );
			$("#results").css( "display", "none" );
			
		}
		
		$(this).css( "border", "1px solid black" );

	});
	
	function searchUpdate(){
		var term = $( "#article_search" ).attr( "value" );
			
		if( term != "" && $( "#article_search" ).attr( "active" ) == "yes" )
		{		
			$("#results").css( "display", "block" );
		
			$.getJSON( "ajaj/article/search/q:"+term, function( data ){
				
				var list = $("#results").html('<ul></ul>').find('ul');
	
				$.each( data, function( i, item ){
				
					url = "projects/article:"+item["id"];
					
					if( item["excerpt"] )
					{
						list.append("<li><h4><a href=\""+url+"\" class=\"title\">"+item["title"]+"</a></h4>"+
						"\u201C"+item["excerpt"]+"\u201D</li>");	
					}
					else
					{
						list.append("<li><h4><a href=\""+url+"\" class=\"title\">"+item["title"]+"</a></h4></li>");
					}
					
					item["excerpt"] =  null;
				});
			});
			
		}
	}
});