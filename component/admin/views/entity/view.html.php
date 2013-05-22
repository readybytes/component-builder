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

/** 
 * Invoice Html View
* @author @author@
 */
require_once dirname(__FILE__).'/view.php';
class @prefix@AdminViewInvoice extends @prefix@AdminBaseViewInvoice
{		
	protected function _adminEditToolbar()
	{	
		Rb_HelperToolbar::apply();
		Rb_HelperToolbar::save();
		Rb_HelperToolbar::save2new('savenew');
		Rb_HelperToolbar::divider();
		Rb_HelperToolbar::cancel();
		Rb_HelperToolbar::divider();
	}
	
	protected function _adminGridToolbar()
	{
		Rb_HelperToolbar::addNew('new');
		Rb_HelperToolbar::editList();
		Rb_HelperToolbar::divider();
		Rb_HelperToolbar::deleteList(Rb_Text::_('COM_@prefix_constant@_JS_ARE_YOU_SURE_TO_DELETE'));
	}
	
	function _displayGrid($records)
	{
		$InvoiceIds = array();
		foreach($records as $record){
			$InvoiceIds[] = $record->invoice_id;
		}
		
		$filter = array('object_id' => array(array('IN', '('.implode(",", $InvoiceIds).')')), 'master_invoice_id' => 0);
		$invoices = Rb_EcommerceAPI::invoice_get_records($filter, array(), '',$orderby='object_id');
		
		$buyerIds  = array();
		foreach ($invoices as $invoice){
			$buyerIds[] = $invoice->buyer_id;
		}
		
		$buyerHelper	= $this->getHelper('buyer');
		$buyer 			= $buyerHelper->get($buyerIds);
		$status_list	= @prefix@Invoice::getStatusList();
		
		$this->assign('invoice', $invoices);
		$this->assign('buyer', $buyer);
		$this->assign('status_list', $status_list);

		return parent::_displayGrid($records);
	}
	
	function edit($tpl= null, $itemId = null)
	{
		$itemId  = ($itemId === null) ? $this->getModel()->getState('id') : $itemId ;
		$invoice = @prefix@Invoice::getInstance($itemId);
		$form 	 = $invoice->getModelform()->getForm($invoice);

		$this->assign('invoice', $invoice);
		$this->assign('form',  $form);
		
		$params        = $invoice->getParams();
		$processor_id  = 0;
		if(!empty($params->processor_id)){
			$processor_id  = $params->processor_id;
		}
		
		$discount	= 0.00;
		$tax		= 0.00;
		
		if($itemId){
			$rb_invoice = $this->_helper->get_rb_invoice($itemId);
			$form->bind(array('rb_invoice' => $rb_invoice)); 
			
			$discount	= $this->_helper->get_discount($rb_invoice['invoice_id']);
			$tax		= $this->_helper->get_tax($rb_invoice['invoice_id']);
		 	$currency 	= $rb_invoice['currency'];

		 	$invoice_url	= $invoice->getPayUrl();
		 	$this->assign('invoice_url', $invoice_url);
		 	
		 	$statusbutton	= $this->_helper->get_status_button($rb_invoice['status']);
		 	$this->assign('statusbutton', $statusbutton);
		 	$this->assign('rb_invoice', $rb_invoice);
		}
		else{
			$rb_invoice = $this->_helper->get_rb_invoice($itemId);
			
			// XITODO : need to fix it properly
			// add 7 days in due date
			$binddata['rb_invoice']['issue_date'] = $rb_invoice['issue_date'];
			$due_date = new Rb_Date($rb_invoice['due_date']);
			$due_date->add(new DateInterval('P7D'));
			$binddata['rb_invoice']['due_date'] = (string)$due_date;
			
			$helper					= $this->getHelper('config');
			$currency 				= $helper->get('currency');
			$terms					= $helper->get('terms_and_conditions');
			$binddata['rb_invoice']['currency'] = $currency;
			$binddata['params'] 	=  array('terms_and_conditions' => $terms);
			$form->bind($binddata);
			
		}	
		
		$rb_invoice_fieldset = $form->getFieldset('rb_invoice');
		$rb_invoice_fields = array();
		foreach ($rb_invoice_fieldset as $field){
			$rb_invoice_fields[$field->fieldname] = $field;
		}

		$invoice_params_fieldset	= $form->getFieldset('params');
		$invoice_params_fields		= array();
		foreach ($invoice_params_fieldset as $field){		 
				$invoice_params_fields[$field->fieldname] = $field->input;
		}
		
		$this->assign('discount', number_format($discount, 2));
		$this->assign('tax', number_format($tax, 2));
		$this->assign('rb_invoice_fields', $rb_invoice_fields);
        $this->assign('processor_id', $processor_id);   
        $this->assign('currency', $currency);
		$this->assign('invoice_params', $invoice_params_fields);
		return true;
	}	
}