var artist_list = [];
var songs_list = [];

var cache = {},
	lastXhr;
        
var cache2 = {},
    lastXhr2;
    
    
                                   
$(function() {
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}

		$( "#art_name" )
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
					this.value = terms.join( "" );
					return false;
				}
			});


        $( "#song_name" )
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
                       lastXhr = $.getScript( _URL + "/external/songs/?name=" + term  , function(data, status, xhr) {
	                        cache[ term ] = songs_list;
                            if ( xhr === lastXhr ) {
	                            response( $.ui.autocomplete.filter(songs_list, term ) );
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
					this.value = "";
                    var str = terms.join( "" );
                        str = str.split("::");
                    var song_key = str[0];
                    add_song_to_album(song_key,"#body-song");
					return false;
				}
			});
});



var itunes_return = '';
function auto_itunes_collection(album_name,txtbox,txtpic) {
    itunes_return = txtbox;
    return_box = txtpic;
    var name = $('#' + album_name).val();
    var url ="http://itunes.apple.com/search?term=" + name + "&entity=album&callback=itunes_album";
    $.getScript(url);
}

function itunes_album(json) {
    if(json.resultCount==0) {
        alert("This Album NOT Found in Itunes Store");
    } else {
        var id = json.results[0].collectionId;
        $("#" + itunes_return).val(id);
        var pic = json.results[0].artworkUrl100;

       local_picture(pic,"album",100,100);

    }
}



function get_song_from_album(id,tbody) {
        show_loading();
        var id = $("#" + id ).val();
        $.get(_AJAX + "/admin/album/auto_get_song/?id=" + id, function(data) {
              var x = $.parseJSON(data);
              if(x.total == 0) {
                 alert("Sorry, no result found!");
              } else {
                 $.each(x.song, function(id,data) {
                     add_song_to_album(data.key,tbody);
                 });
              }
        });
       hide_loading();
}

function add_song_to_album(song_key,tbody) {
  $.get(_AJAX + "/admin/album/add_song_to_album/?song_key=" + song_key + "&album_key=" + album_key, function(data) {
        data = $.parseJSON(data);
        if(data.addnew == true) {
            var id = $(tbody + " tr").length + 1;
            var tr = "<tr id=trsong" + data.key + "><td>" + id + "</td><td><a href='" + _URL + "/admin/song/?action=edit&r=" + data.key + "#s-tabs-url-tab' target=_blank >" + data.name + "</a></td><td><a href='" + _URL + "/admin/artist/?action=search&name=" + data.artist + "' target=_blank >" + data.artist + "</a></td><td><a href='Javascript:void(0);' onclick='remove_song_from_album(" + data.key + ");'>Remove</a></td></tr>";
            $(tbody).append(tr);
        }
  });

}

function remove_song_from_album(key) {
   $("#trsong" + key).fadeOut(1000);
   $.get(_AJAX + "/admin/album/remove_song_from_album/?song_key=" + key + "&album_key=" + album_key);
}