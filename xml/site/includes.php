<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_@name@
 *
 * @copyright   @copyright@
 * @license     @license@
 */

defined('_JEXEC') or die;

// if already loaded do not load
if(!defined('@extendprefix_constant@_FRAMEWORK_LOADED')){
	return;
}

// if JXIFORMS already loaded do not load
if(defined('@prefix_constant@_CORE_LOADED')){
	return;
}

define('@prefix_constant@_CORE_LOADED', true);

// include defines
include_once dirname(__FILE__).'/defines.php';

//load core
@extendprefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/base',		'',	'@prefix@');

@extendprefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/models',		'Model',	'@prefix@');
@extendprefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/models',		'Modelform','@prefix@');

@extendprefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/tables',		'Table',	'@prefix@');
@extendprefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/libs',			'',			'@prefix@');
@extendprefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/helpers',		'Helper',	'@prefix@');

//html
//@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/html/html',		'Html',			'@prefix@');
//@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/html/fields',	'FormField',	'@prefix@');


// site
@extendprefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_SITE.'/controllers',	'Controller',		'@prefix@Site');
@extendprefix@HelperLoader::addAutoLoadViews(@prefix_constant@_PATH_SITE.'/views', @extendprefix_constant@_REQUEST_DOCUMENT_FORMAT,  '@prefix@Site');

// admin
@extendprefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_ADMIN.'/controllers',	'Controller',		'@prefix@Admin');
@extendprefix@HelperLoader::addAutoLoadViews(@prefix_constant@_PATH_ADMIN.'/views', @extendprefix_constant@_REQUEST_DOCUMENT_FORMAT, '@prefix@Admin');

$filename = 'com_@prefix@_extensions';
$language = JFactory::getLanguage();
$language->load($filename, JPATH_SITE);
