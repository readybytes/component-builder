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
 * Base Lib
* @author @author@
 */
class @prefix@Lib extends Rb_Lib
{
	public	$_component	= @prefix_constant@_COMPONENT_NAME;

	static public function getInstance($name, $id=0, $data=null, $dummy = null)
	{
		return parent::getInstance(@prefix_constant@_COMPONENT_NAME, $name, $id, $data);
	}
}
