<?php

/**
* @copyright	Copyright (C) 2009 - 2012 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package 		@prefix_constant@
* @subpackage	Back-end
* @contact		team@readybytes.in
*/

// no direct access
if(!defined( '_JEXEC' )){
	die( 'Restricted access' );
}
JHtml::_('behavior.tooltip');
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
?>
<form action="<?php echo $uri; ?>" method="post" name="adminForm" id="adminForm" class="rb-validate-form">
	<fieldset class="form-horizontal">	
		<div class="control-group">
			Label
			<div class="controls">Field</div>								
		</div>
	</fieldset>
	
	<!--  HIDDEN -->
	<input type="hidden" name="task" value="save" />	
</form>
