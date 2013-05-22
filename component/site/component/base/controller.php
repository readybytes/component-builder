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

/** 
 * Base Controller
* @author @author@
 */
class @prefix@Controller extends Rb_Controller
{
	public $_component = @prefix_constant@_COMPONENT_NAME;	
	
	function __construct($options = array())
	{
		parent::__construct();
		
		if(!isset($this->input)){
			$this->input = @prefix@Factory::getApplication()->input; 
		}		
	}
}
