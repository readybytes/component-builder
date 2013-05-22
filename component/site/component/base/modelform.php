<?php

/**
 * @copyright	Copyright (C) 2009 - 2012 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @package 	@prefix_constant@
 * @subpackage	Front-end
 * @contact		team@readybytes.in
 */

// no direct access
if(!defined( '_JEXEC' )){
	die( 'Restricted access' );
}

/** 
 * Base Model Form
* @author @author@
 */
class @prefix@Modelform extends Rb_Modelform
{
	public	$_component			= @prefix_constant@_COMPONENT_NAME;	
	protected $_forms_path 		= @prefix_constant@_PATH_CORE_FORMS;
	protected $_fields_path 	= @prefix_constant@_PATH_CORE_FIELDS;
}