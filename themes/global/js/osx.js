/*
 * SimpleModal OSX Style Modal Dialog
 * http://www.ericmmartin.com/projects/simplemodal/
 * http://code.google.com/p/simplemodal/
 *
 * Copyright (c) 2010 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Revision: $Id: osx.js 238 2010-03-11 05:56:57Z emartin24 $
 * Edited & Mod by Khoa Bui
 */
var _eERROR = false;
 
$(document).ready(function(e) {
    	$("#modalx").hide();    
 });		
	
 
function osx_set_data(data) {
	$("#datax").html(data);	
}

function osx_waiting(URL,title) {	
	osx_set_data("<div id='osx-loading'><h4>Loading...</h4><b>Please wait, Web Server is processing your request.</b></div>");
	osx_open(URL,title);	
}

function osx_hide_close() {
	$(".simplemodal-close").hide();	
}

function osx_show_close() {
	$(".simplemodal-close").show();
}

function msg_loading() {
	$("#modalx").modal({
			focus:true,
			opacity: 50,
			closeHTML: "",
			escClose: false,
			closeClass: "modalx-close",
	});
}
 
 
function osx_open(URL,title,width) {
		$("OBJECT").hide();
		$("embed").hide();
	
					
		$("#urlre").text(URL);
		$("#urlre").hide();
		
		if(title!=undefined) {
			$("#osx-modal-title").html(title);
		}else {
			$("#osx-modal-title").html("System Messages");
		}
		if(width!=undefined) {
			$("#osx-container").css("width","600px");
		}else {
			$("#osx-container").css("width",width + "px");			
		}
		
		$(function() {
		  $("#osx-modal-content").modal({
			overlayId: 'osx-overlay',
			containerId: 'osx-container',
			closeHTML: '<div class="close"><a href="#" class="simplemodal-close" >x</a></div>',
			minHeight:100,
			minWidth:600,
			escClose: false,
			opacity:65, 
			position:['0',],
			overlayClose:false,
			onOpen:function (d) {			  
			  var self = this;
			  self.container = d.container[0];
			  d.overlay.fadeIn(500, function () {
				$("#osx-modal-content", self.container).show();
				var title = $("#osx-modal-title", self.container);
				title.show();
				d.container.slideDown(0, function () {
				  setTimeout(function () {
					var h = $("#osx-modal-data", self.container).height()
					  + title.height()
					  + 20; // padding
					d.container.animate(
					  {height: h}, 
					  200,
					  function () {
						$("div.close", self.container).show();
						$("#osx-modal-data", self.container).show();
					  }
					);
				  }, 300);
				});
			  })
			},
			onClose:function (d) {
			  var self = this;
			  $("OBJECT").show();
			  $("embed").show();			 
					
			  d.container.animate(
				{top:"-" + (d.container.height() + 20)},
				500,
				function () {
				  self.close(); // or $.modal.close();
				  var URL=$("#urlre").text();
				  if(_eERROR==false) {
					  if(URL!="") {
						  if(URL=="refesh") {
							  location.reload(true);
						  } else {
							  window.location=URL;
						  }
						  
					  }
				  }
				}
			  );
			}
		  });
		});	 
 }
 