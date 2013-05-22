<?php

/**
* @copyright	Copyright (C) 2009 - 2012 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package 		@prefix_constant@
* @contact		team@readybytes.in
*/

// no direct access
if(!defined( '_JEXEC' )){
	die( 'Restricted access' );
} 

if(!defined('RB_FRAMEWORK_LOADED')){
	JLog::add('RB Frameowork not loaded',JLog::ERROR);
}

require_once JPATH_SITE.'/components/com_@name@/@name@/includes.php';

// find the controller to handle the request
$option	= 'com_@name@';
$view	= 'dashboard';
$task	= null;
$format	= 'html';

$controllerClass = @prefix@Helper::findController($option,$view, $task,$format);


$controller = @prefix@Factory::getInstance($controllerClass, 'controller', '@prefix@admin');

// execute task
try{
	$controller->execute($task);
}catch(Exception $e){
	@prefix@Helper::handleException($e);
}

// lets complete the task by taking post-action
$controller->redirect();
