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

// If file is already included
if(defined('@prefix_constant@_SITE_DEFINED')){
	return;
}

//mark core loaded
define('@prefix_constant@_SITE_DEFINED', true);
define('@prefix_constant@_COMPONENT_NAME','@name@');


// define versions
define('@prefix_constant@_VERSION', '0.0.1');
define('@prefix_constant@_REVISION','v0.9.0-4-ga3793b7');

//shared paths
define('@prefix_constant@_PATH_CORE',				JPATH_SITE.'/components/com_@name@/@name@');
define('@prefix_constant@_PATH_CORE_MEDIA',			JPATH_ROOT.'/media/com_@name@');
define('@prefix_constant@_PATH_CORE_FORM',			@prefix_constant@_PATH_CORE.'/form');

// front-end
define('@prefix_constant@_PATH_SITE', 				JPATH_SITE.'/components/com_@name@');
define('@prefix_constant@_PATH_SITE_CONTROLLER',	@prefix_constant@_PATH_SITE.'/controllers');
define('@prefix_constant@_PATH_SITE_VIEW',			@prefix_constant@_PATH_SITE.'/views');
define('@prefix_constant@_PATH_SITE_TEMPLATE',		@prefix_constant@_PATH_SITE.'/templates');

// back-end
define('@prefix_constant@_PATH_ADMIN', 				JPATH_ADMINISTRATOR.'/components/com_@name@');
define('@prefix_constant@_PATH_ADMIN_CONTROLLER',	@prefix_constant@_PATH_ADMIN.'/controllers');
define('@prefix_constant@_PATH_ADMIN_VIEW',			@prefix_constant@_PATH_ADMIN.'/views');
define('@prefix_constant@_PATH_ADMIN_TEMPLATE',		@prefix_constant@_PATH_ADMIN.'/templates');

// Html => form + fields
define('@prefix_constant@_PATH_CORE_FORMS', 		@prefix_constant@_PATH_CORE.'/html/forms');
define('@prefix_constant@_PATH_CORE_FIELDS', 		@prefix_constant@_PATH_CORE.'/html/fields');

// object to identify extension, create once, so same can be consumed by constructors
Rb_Extension::getInstance(@prefix_constant@_COMPONENT_NAME, array('prefix_css'=>'@name@'));