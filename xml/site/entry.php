<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_@name@
 *
 * @copyright   @copyright@
 * @license     @license@
 */

// no direct access
if(!defined( '_JEXEC' )){
	die( 'Restricted access' );
}

if(!defined('RB_FRAMEWORK_LOADED')){
	JLog::add('RB Frameowork not loaded',JLog::ERROR);
}

require_once  dirname(__FILE__).'/@name@/includes.php';
$option	= 'com_@name@';
$view	= 'dashboard';
$task	= null;
$format	= 'html';

$controllerClass = @prefix@Helper::findController($option, $view, $task, $format);

$controller =  @prefix@Factory::getInstance($controllerClass, 'controller', '@prefix@site');

// execute task
$controller->execute($task);

// lets complete the task by taking post-action
$controller->redirect();
