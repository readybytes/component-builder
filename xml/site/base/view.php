<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_@name@
 *
 * @copyright   @copyright@
 * @license     @license@
 */

defined('_JEXEC') or die;

if(RB_REQUEST_DOCUMENT_FORMAT === 'ajax'){
	class @prefix@Viewbase extends @extendprefix@ViewAjax{}
}elseif(RB_REQUEST_DOCUMENT_FORMAT === 'json'){
	class @prefix@Viewbase extends @extendprefix@ViewJson{}
}else{
	class @prefix@Viewbase extends @extendprefix@ViewHtml{}
}


class @prefix@View extends @prefix@Viewbase
{
	
}