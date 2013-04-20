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
@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/base',		'',	'@prefix@');

@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/models',		'Model',	'@prefix@');
@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/models',		'Modelform','@prefix@');

@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/tables',		'Table',	'@prefix@');
@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/libs',			'',			'@prefix@');
@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/helpers',		'Helper',	'@prefix@');

//html
//@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/html/html',		'Html',			'@prefix@');
//@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_CORE.'/html/fields',	'FormField',	'@prefix@');


// site
@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_SITE.'/controllers',	'Controller',		'@prefix@Site');
@prefix@HelperLoader::addAutoLoadViews(@prefix_constant@_PATH_SITE.'/views', RB_REQUEST_DOCUMENT_FORMAT,  '@prefix@Site');

// admin
@prefix@HelperLoader::addAutoLoadFolder(@prefix_constant@_PATH_ADMIN.'/controllers',	'Controller',		'@prefix@Admin');
@prefix@HelperLoader::addAutoLoadViews(@prefix_constant@_PATH_ADMIN.'/views', @extendprefix@REQUEST_DOCUMENT_FORMAT, '@prefix@Admin');

$filename = 'com_@prefix@_extensions';
$language = JFactory::getLanguage();
$language->load($filename, JPATH_SITE);
