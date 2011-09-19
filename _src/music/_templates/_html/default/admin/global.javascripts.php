// global javascript for Administrator
var _URL = "<?=_URL_?>";
var _AJAX = "<?=_URL_?>/ajax.";
var _EXT = "<?=_URL_?>/external";
var AppID = "<?=$config['API']['Bing']?>";
var tmp_id = '';
var return_box = '';

function check_admin_login(user,pass) {
	var username = document.getElementById(user).value;
	var password = document.getElementById(pass).value;
    var url  = _AJAX + "/admin/login/submit";

  	osx_waiting();
    osx_hide_close();
        
	$.post(url, { username: username, password: password }, function(data) {
    
		var x = $.parseJSON(data);
        if(x.result == 'error') {
        	classname='error';
            $("#urlre").text("");
            rurl = "";
            reload = "";
            _eERROR = true;
            var rurl = _URL + "/admin/login";
        } else {
        	classname='ok';
            _eERROR = false;
            var rurl = _URL + "/admin/dashboard";
            window.location = rurl;
        }               
        
        osx_set_data("<div class='msg-" + classname + "'>" + x.text + "</div>");
        
        if(x.title == undefined ) {
        	title = "";
        } else {
        	title = x.title;
        }
        osx_show_close();        
        osx_open(rurl,title);    

    });
   	
	
}

// Return a helper with preserved width of cells
var fixHelper = function(e, ui) {
	ui.children().each(function() {
		$(this).width($(this).width());
	});
	return ui;
};
 
 
function auto_get_youtube(id) {
	var youtube = document.getElementById(id).value;
    if(youtube.length > 5 ) {
    	$.getScript(_URL + "/external/youtube/?youtube=" + youtube + "&id=" + id);
    }
}


function go_post(url,frm,rurl,reload) {
	url = _AJAX + "/" + url;
    var classname = 'info';
    
    if(rurl == undefined ) {
    	rurl = "";
    }
  	if(rurl != "") {
    	rurl = _URL + "/" + rurl;
    }    
    
    if(reload == undefined ) {
    	reload = "";
    }
    
  	osx_waiting(rurl);
    osx_hide_close();
   
    $.post(url, $(frm).serialize(), function(data) {
    	var x = $.parseJSON(data);
        if(x.result == 'error') {
        	classname='error';
            $("#urlre").text("");
            rurl = "";
            reload = "";
            _eERROR = true;
        } else {
        	classname='ok';
            _eERROR = false;
        }               
        
        osx_set_data("<div class='msg-" + classname + "'>" + x.text + "</div>");
        
        if(x.title == undefined ) {
        	title = "";
        } else {
        	title = x.title;
        }
        osx_show_close();
        
        osx_open(rurl, title )
        
        if(reload!="") {
        	eval(reload);
        }
    });
}


function auto_get_seo(obj1_id,obj2_id) {	
	var text = document.getElementById(obj1_id).value;    
	url = _AJAX + "/get_seo/?text=" ;
    $.get(url + text, function(data) {
    	var x = $.parseJSON(data);
        document.getElementById(obj2_id).value = x.data;
    });
}

function update_order_box(obj,table,col_key,col_order,key) {
	var new_order = $(obj).val();
	var pat=/[0-9]+/gi;
    if((new_order != "") && (new_order>=0) && (new_order.match(pat)) ) {
    	
    	$.post(_AJAX + "/update_order_box/", { table: table, col_key: col_key, col_order: col_order, new_value: new_order, key: key }, function(data) {
        	var x = $.parseJSON(data);
            if(x.result == 'ok') {
            	$(obj).removeClass("greenbox");
                $(obj).removeClass("redbox");
            } else {
                $(obj).addClass("redbox"); 
            }
        });
    }
}



function fast_delete(url,key,id) {
    var x = confirm("Are You Sure ?");
    if(x == true) {
        $.post(_AJAX + "/" + url, { key : key }, function(data) {
              $("#" + id).fadeOut(500);
        });
     }
}




function search_song() {
	apprise("Please enter song name, Youtube URL, or an artist",  {'input': ' ', 'textOK':'Search', 'animate':true } , function(r) {
    	if(r) {
        	window.location = _URL + "/admin/song/?action=search&song=" + r;            
        }
    });
    
    
}


function search_artist() {
	apprise("Please enter an Artist",  {'input': ' ', 'textOK':'Search', 'animate':true } , function(r) {
    	if(r) {
        	window.location = _URL + "/admin/artist/?action=search&name=" + r;            
        }
    });
    
    
}

function auto_youtube(id1,id2,id3) {
	var song = document.getElementById(id1).value;
    var art = document.getElementById(id2).value;
	$.get(_AJAX + "/admin/song/youtube/?name=" + song + "&artist=" + art, function(data) {
    	var x = $.parseJSON(data);
        if(x.result = 'ok') {
        	document.getElementById(id3).value = x.text;
      		setup_media_player("http://www.youtube.com/watch?v=" + x.text);
        } else {
        	alert('Sorry, Can not auto find this song!');
        }
    }); 
}

function auto_tags(id1,id2,id3) {
	var song = document.getElementById(id1).value;
    var art = document.getElementById(id2).value;	
    var tags = art.replace(/[\[\]]+/gi,"");
    document.getElementById(id3).value = song + " , " + tags;
}

function youtube_search(id1,id2,id3) {
	var song = document.getElementById(id1).value;
    var art = document.getElementById(id2).value.replace(/[\[\]\,]+/gi,'');		
    window.open('http://www.youtube.com/results?search_query=' + song + '+' + art +'&aq=f');
}

function auto_update_artist(name) {
	$.get(_URL + "/plugins./artistyoutube/?name=" + name, function(data) {
    	$("#autoupdate").append(data);
			location.reload(true);

    });
	
}

function setup_media_player(videofile) {
 if($("#mediaspace").length>=0) {
      jwplayer('mediaspace').setup({
                    'flashplayer': _URL + '/themes/player/player.swf',
                    'file': videofile,
                    'controlbar': 'bottom',
                    'width': '470',
                    'height': '320'
      });
  }
}


function auto_update_art_pic(kw,id) {
	kw = kw.replace(/[\&\.\$\#\@\'\"\`\*\(\)\{\}\:\;\?\!]+/gi," ");
	kw = kw.replace(/\s[\s]+/gi,' ');
	kw = kw.replace(/\s/gi,'+');
	tmp_id = id;
	var url = "http://api.search.live.net/json.aspx?Appid=" + AppID + "&sources=image&Jsoncallback=make_thumb&JsonType=callback&AdultOption=Strict&SafeSearch=Strict&query=" + kw;
	$.getScript(url);
}




function make_thumb(data) {
	data = data.SearchResponse.Image.Results;
	$.each(data, function(index,value) {
		
		var image_url = data[index].MediaUrl;
		var x_url = data[index].Url;
		var x_width = data[index].Width;
		var x_height = data[index].Height;
					
		if(index==0) {						
			$.post( _AJAX + "/admin/artist/cp_art_pic", { url: image_url }, function(data) {
            	$('#' + tmp_id).val(data);
			});
		}		
		
	});
}

function make_loading(obj) {
	var ori = $(obj).val();
    /*  */
	$(obj).val("Loading ...");
    $(obj).fadeOut(10000);
}

function upload_picture(textbox) {
	
}


// copy a picture from other host to our local
function local_picture(pic,folder,w,h) {
     $.post(_EXT + "/new_image" , { url : pic, folder : folder , width: w , height : h } , function(data) {
            var x = $.parseJSON(data);
            $("#" + return_box).val(x.url);
        });

}


function show_loading() {
    if($("#loading-modal-overlay").length>0) {
        var overlay = $("#loading-modal-overlay");
        overlay.show();
    } else {
        var overlay = $("<div id='loading-modal-overlay'></div>");
        overlay.css("opacity", 0.8);
        overlay.css("position","fixed");
        overlay.css("z-index","100");
        overlay.css("top","0px");
        overlay.css("left","0px");
        overlay.css("height","100%");
        overlay.css("width","100%");
        overlay.css("background","#000");
        overlay.fadeIn(150);
        $(overlay).click(function(e) {
           e.preventDefault();
        });

        $("body").append(overlay);

    }
}

function hide_loading() {
   setTimeout('$("#loading-modal-overlay").fadeOut(500);',2000);
}