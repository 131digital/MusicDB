var artist_list = [];

var cache = {},
	lastXhr;
    
    
                                   
$(function() {
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}

		$( "#song_artist" )
			// don't navigate away from the field on tab when selecting an item
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
						$( this ).data( "autocomplete" ).menu.active ) {
						event.preventDefault();
				}
			})
			.autocomplete({
				minLength: 2,
				source: function( request, response ) {
                	var term = extractLast( request.term );
                  		term = term.replace(/[\[\]]/gi,'');
					// delegate back to autocomplete, but extract the last term
                    if ( term in cache ) {                    	
                        response( cache[ term ] );
                        return;
					} else {
                       lastXhr = $.getScript( _URL + "/external/artists/?name=" + term  , function(data, status, xhr) {
	                        cache[ term ] = artist_list;                                                     
                            if ( xhr === lastXhr ) {
	                            response( $.ui.autocomplete.filter(artist_list, term ) );
                            }
                        });     
                    }               					
				},
                
				focus: function() {
					// prevent value inserted on focus
					return false;
				},
				select: function( event, ui ) {
					var terms = split( this.value );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( "" + ui.item.value + "" );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( ", " );
					return false;
				}
			});
});

