<?php

/**
* @copyright	Copyright (C) 2009 - 2012 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package 		@prefix_constant@
* @contact		team@readybytes.in
*/

// no direct access
if(!defined( '_JEXEC' )){
	die( 'Restricted access' );
}

// if @prefix_constant@ already loaded, then do not load it again
if(defined('@prefix_constant@_CORE_LOADED')){
	return;
}

define('@prefix_constant@_CORE_LOADED', true);

// include defines
include_once dirname(__FILE__).'/defines.php';

//load core
Rb_HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/base',		     '',		 '@prefix@');

Rb_HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/models',		'Model',	 '@prefix@');
Rb_HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/models',		'Modelform', '@prefix@');

Rb_HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/tables',		'Table',	 '@prefix@');
Rb_HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/libs',			'',			 '@prefix@');
Rb_HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/helpers',		'Helper',	 '@prefix@');
Rb_HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/payment',		'',	 		 '@prefix@');

//html
Rb_HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/html/html',		'Html',		 '@prefix@');
Rb_HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/html/fields',	'FormField', '@prefix@');

// site
Rb_HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_SITE.'/controllers',	'Controller',		'@prefix@Site');
Rb_HelperLoader::addAutoLoadViews(@prefix_constant@_PATH_SITE.'/views', RB_REQUEST_DOCUMENT_FORMAT,  '@prefix@Site');

// admin
Rb_HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_ADMIN.'/controllers',	'Controller',		'@prefix@Admin');
Rb_HelperLoader::addAutoLoadViews(@prefix_constant@_PATH_ADMIN.'/views', RB_REQUEST_DOCUMENT_FORMAT, '@prefix@Admin');