// JavaScript Document


var _AJAX = _URL + "/ajax.";
var _JS	  = _URL + "/js.";
var _EXT  = _URL + "/external";

var set_update_artist = false;

function auto_update_art_pic(kw,img,div,key) {	
	kw = kw.replace(/[\&\.\$\#\@\'\"\`\*\(\)\{\}\:\;\?\!]+/gi," ");
	kw = kw.replace(/\s[\s]+/gi,' ');
	kw = kw.replace(/\s/gi,'+');
	
	var url = "http://api.search.live.net/json.aspx?Appid=" + AppID + "&sources=image&Jsoncallback=make_thumb&JsonType=callback&AdultOption=Strict&SafeSearch=Strict&query=" + kw;
	if(key != undefined)  {
		if(key.match(/[0-9]+/)) {
			set_update_artist = key;
		}
	}
	$.getScript(url);
		
}

function playsong() {
	if($("input[type=checkbox][group=checksong]:checked").length > 0 ) {
		if(_KEY_IS_PLAYING=="") {
			check_all_box(this);
			nextsong();
		} else {
			jwplayer().play();
		}
	} else {
		check_all_box(this);
		nextsong();		
	}	
}

function buysong() {
	$.get(_AJAX + "/lyrics/show_lyris_info/?key=" + _KEY_IS_PLAYING, function(data) {
					
			var x = $.parseJSON(data);												
			var key = x.song_name + "+" + x.art_name;
			var url = "http://www.amazon.com/s/?url=search-alias=digital-music&field-keywords=" + key + "&tag=topworson-20&link_code=wql&camp=212361&creative=380601&_encoding=UTF-8";
			window.location=url;
			
	});	
}

function pausesong(obj) {
	if(typeof jwplayer != "undefined") {
		jwplayer().pause();
		if(jwplayer().getState()=="PAUSED") {
			$(obj).val("♫ Play");
			$(obj).addClass("green");
		}else {
			$(obj).val("♪ Pause");
			$(obj).removeClass("green");
		}
	}
}

function show_subplayer(key) {
	$("#fm").remove();
	$.get(_AJAX + "/lyrics/show_lyris_info/?key=" + key, function(data) {
			$('#subplayer').fadeIn(2000);			
			var x = $.parseJSON(data);
			$("#subtitle").html("Listening to <a href='" + x.song_playing + "' target=_blank >" + x.song_name + " - " + x.art_name + "</a>");
			
			var art_info = "<div style=clear:both; ><img src='" + x.art_pic + "' align=left hspace=5 vspace=5 width=80 border=1 class=xbox2 > " + x.art_bio + " <a href='" + x.art_url + "' target=Blank >[more]</a></div>";
			if(x.art_bio=="...") {
				art_info = "";
			}
			
			var html = '<div style="clear:both;"><iframe src="http://www.facebook.com/plugins/like.php?app_id=241090485922567&amp;href=' + x.song_playing + '&amp;send=false&amp;layout=button_count&amp;width=80&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px; " allowTransparency="true"></iframe>' + "<div id='songsidebar" + x.song_key +"' avg='" + x.song_avg + "' data='" + x.song_key + "' style='float:left;' ></div></div>" + art_info ;	
			
			$("#art_info_x").html(html);
			$("#art_info_x").height("auto");
			
			setup_raty("#songsidebar" + x.song_key, _THEME + "/img/",x.song_avg,"5",false);			
			
						
			
			
			
			
			
	});
	
}

function play_nextsong() {
	
	if($("input[type=checkbox][group=checksong]:checked").length > 0 ) {	
		if(_KEY_IS_PLAYING=="") {
			check_all_box(this);
			nextsong();
		} else {
			nextsong();
		}	
	} else {
		check_all_box(this);
		nextsong();				
	}
}
var subtime = document.getElementById("subtime");
function subplayer(duration,offset,position) {
	var m = Math.round(position/60);
	var s = position - (m*60);	
	if(s<0) {
		m = m - 1;
		s = position - (m*60);
	}
	$("#subtime").html(m + ":" + s);
	$("#subbar" ).progressbar({
			value: (position/duration) * 100
	});
	
}

function make_thumb(data) {
	data = data.SearchResponse.Image.Results;
	var html='';
	$("#morethumb").html(html);
	$.each(data, function(index,value) {
		
		var image_url = data[index].MediaUrl;
		var x_url = data[index].Url;
		var x_width = data[index].Width;
		var x_height = data[index].Height;
					
		if(index==0) {			
			if($("#artist_img").attr("src")=="") {
				$("#artist_img").attr("src",image_url);
			}	
			$.post( _EXT + "/update_artist_pic", { key: set_update_artist, url: image_url }, function(data) {
			});
		}
		if(index<=7) {
			html += ' <a href="'+ image_url +'" class=fancy ><img src="'+ image_url +'" class="xbox"  ></a> ';
		}
		
	});
	$("#morethumb").append(html);
	call_thumb();
}

function call_thumb(classname) {
	if(classname == undefined ) {
		classname="fancy";
	}
	$("a[class=" + classname + "]").fancybox();

}


// update raing
function do_update_rating(song_key,score,array) {
	$.post(_EXT + "/rating", { key : song_key, score : score, ar : array }, function(data) {
	});
}

function add_song_key_to_playlist() {
	if(session_id!='') {
		var song_key = $("#pl_songkey").val();
		var playlist_key = $("#addpl_key").val();
		if((song_key!="")&&(playlist_key!="")&&(playlist_key!="addnew")) {
			$.post(_AJAX + "/myplaylist/addsong_tolist" , { song_key : song_key, playlist_key : playlist_key }, function(data) {
				var x = $.parseJSON(data);
				if(x.result == 'ok') {
					alert("Added This Song To Your Playlist");
				}
				
				$('#addtoplaylist').fadeOut(500);
				$.uniform.update($('#addpl_key'));	
				
			});
		}
	}
}

function create_new_playlist() {
	if(session_id!='') {
		var x=prompt("Please enter playlist name:","");
		if(x!=null) {
			$.post(_AJAX + "/myplaylist/addnew", { playlist_name: x , playlist_sharing: 'yes', playlist_pic: '', ajax: 'true'}, function(data) {
				var x = $.parseJSON(data);
				if(x.result == 'ok') {
					var newopt = "<option value'" + x.playlist_key + "' >" + x.playlist_name + "</option>";
					$("#addpl_key").append(newopt);					
					$.uniform.update($('#addpl_key'));	
				} else {
					alert("Please try again with new name!");
				}
			});
		}
	} else {
			var x = confirm("You must Login to add this song to playlist. Click OK to login.");
			if( x == true ) {
				request_login_box();
			}	
						
			$("#addpl_key").val("");		
		}
}

function buy_mp3(key) {
	var url = "http://www.amazon.com/s/?url=search-alias=digital-music&field-keywords=" + key + "&tag=topworson-20&link_code=wql&camp=212361&creative=380601&_encoding=UTF-8";
	window.open(url);
	
}

function add_to_playlist(key,obj) {
	if(session_id!='') {
		 $("#pl_songkey").val(key);
		 var pl = $("#addtoplaylist");
		 if(typeof obj != "undefined") {
			 $(pl).css("position","absolute");
			 $(pl).css("left",$(obj).position().left - ($(pl).width()/2));
			 $(pl).css("top",$(obj).position().top-20);	
		 }
		 $(pl).css("visibility","visible"); 
		 $(pl).fadeIn(1000);
		 $("#addpl_key option").not("[value='addnew']").not("[value='']").remove();
		 var newopt = '';
		 $.getJSON(_AJAX + "/myplaylist/get_mylist", function(data) {
			$.each(data, function(index,value) {
				newopt += "<option value='" + value.playlist_key + "' >" + value.playlist_name + "</option>";
			});
			$("#addpl_key").append(newopt);
		 });
		$.uniform.update($('#addpl_key'));	
		
		
	} else {				
			var x = confirm("You must Login to add this song to playlist. Click OK to login.");
			if( x == true ) {
				request_login_box();
			}		
	}
}



var _LIKE_URL = '';
var _KEY_IS_PLAYING = '';
function play_this_song(obj,key) {
	
	
	$("tr[id^='trsong']").removeClass("trlight");
	$("tr[id=needremove]").remove();
		
		
	var html = "<tr class=needremove id=needremove ><td colspan=10 ><p align=center ><img src='" + _THEME + "/img/loading.gif' border=0 ></p></td></tr>";
	$("tr[id=trsong" + key + "]").addClass("trlight");	
	$("tbody[id='playingmedia']:first").prepend(html);
	$("#art_info_x").html("<p align=center ><img src='" + _THEME + "/img/loading.gif' border=0 ></p>");
							       
		$.post(_EXT + "/media", { key : key, callback: 'nextsong()' }, function(data) {
			var x= $.parseJSON(data);
			
			$("input[type=checkbox][data='" + key + "']").removeAttr("checked");
			$.uniform.update($("input[type=checkbox][data='" + key + "']"));
			
			var html = "<td colspan=10 >" + x.html + '<iframe src="http://www.facebook.com/plugins/like.php?app_id=241090485922567&amp;href=' + x.song_url + '&amp;send=false&amp;layout=button_count&amp;width=80&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px; position:relative; top:-20px; " allowTransparency="true"></iframe>' + "<div id='songembed" + key +"' avg='" + x.info.song_avg + "' data='" + key + "' style='float:left;position:relative;top:-20px;' ></div></td>";	
				
			_KEY_IS_PLAYING = key;
			$("tr[id=needremove]").html(html);

			
			setup_raty("#songembed" + key, _THEME + "/img/", x.info.song_avg ,"5",false);			
			
		});

   	
}


function nextsong() {
			
	var key = $("input[type=checkbox][group=checksong]:checked:first").attr("data");	
	 play_this_song(true,key);
	
	
}

var _IS_ALL_CHECKED = false;
function check_all_box() {

	if(_IS_ALL_CHECKED == false) {
		$("input:checkbox").attr("checked","checked");
		_IS_ALL_CHECKED = true;
	} else {
		$("input:checkbox").removeAttr("checked");
		_IS_ALL_CHECKED = false;
	}
	$.uniform.update($('input:checkbox'));	
}

function setup_raty(obj,path,start,number,readyonly,array) {
	$(document).ready(function(e) {
		$(obj).html('');
		$(obj).raty({
			  half:  true,
			  path: path,
			  start: start,
			  readOnly:  readyonly,
			  number:  number,
			  click: function(score, evt) {
				  var key = $(obj).attr("data");
				  key = key.replace(/song/gi,"");						  
				  do_update_rating(key,score,array);
			  }
		});         
    });	
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


function request_login_box() {
	$.get(_AJAX + "/login/loginbox", function(data) {
		var x = $.parseJSON(data);
		osx_set_data(x.html);
		osx_open();
	});
}

function request_logout() {
	$.get(_AJAX + "/logout/logout", function(data) {
		var x = $.parseJSON(data);
		osx_set_data(x.text);
		osx_open(_URL + '/home',x.title);
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

function list_delete_song(song_key,playlist_key,obj) {
	if(session_id!='') {
		var td = $(obj).parent("td");
		var tr = $(td).parent("tr");
		$(tr).fadeOut(2000);					
		$.post(_AJAX + "/myplaylist/quickdelete", { song_key : song_key , playlist_key : playlist_key } , function(data) {
		});
	}
}

var _VIDEO = false;
function video_on_off(obj,extra) {
	var text = $(obj).val();
	if(_VIDEO==false) {
		if(typeof jwplayer != 'undefined') {			
					  jwplayer().resize(468,400);
		}
		$(obj).val("♫ Audio");
		$(obj).removeClass("green");
		$("#needremove").css("height","400");
		if(typeof extra == "undefined") {
			extra = 400;
		} else {
			extra = 400 + extra;
		}
		$("#needremove").find("div[id$='_wrapper']").css("height",extra);
		_VIDEO = true;
	} else {
		if(typeof jwplayer != 'undefined') {			
					  jwplayer().resize(468,24);
		}
		$(obj).val("♪♪ Video");	
		$(obj).addClass("green");
		$("#needremove").css("height","24");
		$("#needremove").find("div[id$='_wrapper']").css("height","24");	
		_VIDEO = false;		
	}
}

function get_form_search_submit(value,frm) {
	if(value!="") {
		$(frm).attr("action",_URL + "/search/" + value);
	}
}


function onair(radio) {
	$(document).ready(function(e) {        
		$("tr[id^='trsong']").removeClass("trlight");
		$("tr[id=needremove]").remove();											
		$("#fm").remove();
		$('#subplayer').fadeOut(1000);
		var html='';var fmhomepage ="";
		if(typeof radio == "undefined") {
			radio="klove";
		}
		html="<h3 class='icon_sound'> Select Channel: <select id='channelfm' onchange='onair(this.value);' ><option value='wayfm'> WayFM </option> <option value='todaychristianmusic' > TheFish / TodaysChristianMusic </option> <option value='klove'> Klove </option> <option value='air1'> Air1 Radio </option> <option value='christianrock'> Christian Rock </option> <option value='nrtradio'> NRT Radio</option> </select> <input type='button' class='blue' value='Stop ♫' onclick=$('#fm').remove(); > </h3>";

		
		if(radio=="wayfm") {
			html= html +'<iframe src="http://main.wayfm.com/modules/mod_music_player/popup.php?preRollVid=&streamLow=wayw_low.stream&streamHigh=wayw_high.stream&npFile=&sponsorname=TopWorshipSongs.com&sponsorurl=http://topworshipsongs.com/&sponsorgfx=&sponsorname1=&sponsorurl1=&sponsorgfx1=&fpversionNum=9.0.0" frameborder="0" scrolling="no"  allowtransparency="yes" height="280" width="380" marginheight="0" marginheight="0"  ></iframe>';
			fmhomepage = "<a href='http://wayfm.com' target=_blank >www.wayfm.com</a> | <a href='http://main.wayfm.com/on-the-air/songsrecentlyplayed.html' target=_blank >Recently Playing</a>";
		}	
		if(radio=="todaychristianmusic") {
		//	html= html + '<p align=center ><img src="http://media.salemwebnetwork.com/TodaysChristianMusic/sys/gr/logo.gif" class=xbox ></p><iframe src="http://den-a.plr.liquidcompass.net/player/flash/audio_player.php?id=TCMIR&uid=404" width=1 height=1 frameborder=0 scrolling=no ></iframe>';
			html= html + '<iframe src="http://den-a.plr.liquidcompass.net/player/flash/audio_player.php?id=TCMIR&uid=404" height="240" width="420" frameborder=0 scrolling=no ></iframe>';	
			fmhomepage = "<a href='http://www.todayschristianmusic.com/radio/songs-played/' target=_blank >www.TodaysChristianMusic.com</a>";	
		}		
		if(radio=="klove") {
		//	html= html + '<p align=center ><img src="http://www.klove.com/images/k-love.png" class=xbox ></p><iframe src="http://www.klove.com/listen/player.aspx" width=1 height=1 frameborder=0 scrolling=no ></iframe>';		
	
			html= html + '<iframe src="http://www.klove.com/listen/player.aspx" height="240" width="430" frameborder=0 scrolling=no ></iframe>';	
					
			fmhomepage = "<a href='http://www.klove.com/music/songs/recent-songs.aspx' target=_blank >www.klove.com</a>";	
		}
		if(radio=="air1") {
			html= html + '<iframe src="http://www.air1.com/broadcast/playnow.aspx?media=listen&bt=3&" height="260" width="380" frameborder=0 scrolling=no ></iframe>';	
			fmhomepage = "<a href='http://air1.com' target=_blank >www.air1.com</a> | <a href='http://www.air1.com/broadcast/nowplaying.aspx' target=_blank >Songs Information</a>";			
		}	
		if(radio=="christianrock") {
			html= html + '<iframe src="http://www.christianrock2.net/player.asp?action=&speed=High&site=CRDN" height="260" width="500" frameborder=0 scrolling=no ></iframe>';	
			fmhomepage = "<a href='http://christianrock.net' target=_blank >www.christianrock.net</a>";			
		}	
		if(radio=="nrtradio") {
			html= html + '<p align=center ><embed type="application/x-shockwave-flash" src="http://www.nrtradio.net/nativeradio2small.swf" width="300" height="50" style="undefined" id="nativeradio2small" name="nativeradio2small" allowscriptaccess="always" bgcolor="#cccccc" quality="high" scale="noscale" flashvars="swfcolor=2c85c7&amp;swfwidth=300&amp;swfradiochannel=NRT Radio - The NEW Sound Of Christian Music&amp;swfstreamurl=http://65.49.77.146:9040&amp;swfpause=0"></p> ';		
			fmhomepage = "<a href='http://loudcity.com/stations/nrtradio/files/show/listennow.html#' target=_blank >www.NewReleaseTuesday.com</a>";		
				
		}			
		
				
		
		
		html += "<h3 class=''> Radio Website: " + fmhomepage + " </h3>";
		
		var div = $(document.createElement("div"));
		$(div).html(html);
		$(div).addClass("fmblack");
		$(div).attr("id","fm");	
		$("body").append(div);
		$("#channelfm").val(radio);
		$("#channelfm").uniform();
	});
}


function get_report_form(subject) {
	$.get(_EXT + "/get_report_form/?subject=" + subject ,  function(data) {
			var x = $.parseJSON(data); 
			osx_set_data(x.html);
			osx_open("","Report Form");
			
	});
}


$.getScript("http://dkphp.com/musicdb/player/jwplayer.js");