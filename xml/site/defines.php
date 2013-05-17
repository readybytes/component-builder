<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_@name@
 *
 * @copyright   @copyright@
 * @license     @license@
 */

if(defined('_JEXEC')===false) die();

// If file is already included
if(defined('@prefix_constant@_DEFINED')){
	return;
}

//mark core loaded
define('@prefix_constant@_DEFINED', true);
define('@prefix_constant@_COMPONENT_NAME','@prefix@');


// define versions
define('@prefix_constant@_VERSION', '0.9.0');
define('@prefix_constant@_REVISION','v1.0.0-62-geaec788');

//shared paths
define('@prefix_constant@_PATH_CORE',				JPATH_SITE.'/components/com_@name@/@name@');
define('@prefix_constant@_PATH_CORE_FORM',			@prefix_constant@_PATH_CORE.'/form');

// frontend
define('@prefix_constant@_PATH_SITE', 				JPATH_SITE.'/components/com_@name@');
define('@prefix_constant@_PATH_SITE_CONTROLLER',		@prefix_constant@_PATH_SITE.'/controllers');
define('@prefix_constant@_PATH_SITE_VIEW',			@prefix_constant@_PATH_SITE.'/views');
define('@prefix_constant@_PATH_SITE_TEMPLATE',		@prefix_constant@_PATH_SITE.'/templates');

// backend
define('@prefix_constant@_PATH_ADMIN', 				JPATH_ADMINISTRATOR.'/components/com_@prefix@');
define('@prefix_constant@_PATH_ADMIN_CONTROLLER',	@prefix_constant@_PATH_ADMIN.'/controllers');
define('@prefix_constant@_PATH_ADMIN_VIEW',			@prefix_constant@_PATH_ADMIN.'/views');
define('@prefix_constant@_PATH_ADMIN_TEMPLATE',		@prefix_constant@_PATH_ADMIN.'/templates');

// Html => form + fields
//define('@prefix_constant@_PATH_CORE_FORMS', 			@prefix_constant@_PATH_CORE.'/html/forms');
//define('@prefix_constant@_PATH_CORE_FIELDS', 		@prefix_constant@_PATH_CORE.'/html/fields');


// object to identify extension, create once, so same can be consumed by constructors
@extendprefix@Extension::getInstance(@prefix_constant@_COMPONENT_NAME, array('prefix_css'=>'@name@'));
