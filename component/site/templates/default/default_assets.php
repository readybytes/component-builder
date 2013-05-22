<?php

/**
* @copyright	Copyright (C) 2009 - 2012 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package 		@prefix_constant@
* @subpackage	Front-end
* @contact		team@readybytes.in
*/

// no direct access
if(!defined( '_JEXEC' )){
	die( 'Restricted access' );
}

Rb_HelperTemplate::loadSetupEnv();
Rb_HelperTemplate::loadSetupScripts();

// load bootsrap css
Rb_Html::_('bootstrap.loadcss');

Rb_Html::script(@prefix_constant@_PATH_CORE_MEDIA.'/js/@name@.js');
Rb_Html::script(dirname(__FILE__).'/_media/js/site.js');

Rb_Html::stylesheet(@prefix_constant@_PATH_CORE_MEDIA.'/js/@name@.css');
Rb_Html::stylesheet(dirname(__FILE__).'/_media/css/site.css');
