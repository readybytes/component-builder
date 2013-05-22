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

if(RB_REQUEST_DOCUMENT_FORMAT === 'ajax'){
	class @prefix@Viewbase extends Rb_ViewAjax{}
}elseif(RB_REQUEST_DOCUMENT_FORMAT === 'json'){
	class @prefix@Viewbase extends Rb_ViewJson{}
}else{
	class @prefix@Viewbase extends Rb_ViewHtml{}
}


/** 
 * Base View
* @author @author@
 */
class @prefix@View extends @prefix@Viewbase 
{
	public $_component = @prefix_constant@_COMPONENT_NAME;
	
	public function __construct($config = array())
	{
		parent::__construct($config);
		
		// intialize input
		$this->input = @prefix@Factory::getApplication()->input;
		return $this;
	}
}
