/**
* @copyright	Copyright (C) 2009 - 2012 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		@prefix_constant@
* @subpackage	Javascript
* @contact 		team@readybytes.in
*/

if (typeof(@name@)=='undefined'){
	var @name@ 	= {};
	@name@.$ 	= @name@.jQuery = rb.jQuery;
	@name@.ajax	= rb.ajax;
	@name@.ui	= rb.ui;
}

if (typeof(@name@.element)=='undefined'){
	@name@.element = {}
}

(function($){
// START : 	
// Scoping code for easy and non-conflicting access to $.
// Should be first line, write code below this line.

/*--------------------------------------------------------------
  URL related to works
   	url.modal 		: open a url in modal window
   	url.redirect 	: redirect current window to new url
   	url.fetch		: fetch the url and replace to given node 
--------------------------------------------------------------*/
@name@.url = {
  	modal: function( theurl, options){
		if( typeof options=== "undefined" ){
			var ajaxCall = {'url':theurl, 'data': {}, 'iframe': false};
		}	
		else{
		    var ajaxCall = {'url':theurl, 'data':options.data, 'iframe' : false};
		}

		@name@.ui.dialog.create(ajaxCall, '', 650, 300);
	},
		
	redirect:function(url){
		        document.location.href=url;
	}
};

// ENDING :
// Scoping code for easy and non-conflicting access to $.
// Should be last line, write code above this line.
})(@name@.jQuery);