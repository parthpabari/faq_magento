<?php

/**
 * @author Parth Pabari
 * @copyright Copyright (c) 2019 Parth Pabari
 * @package Parth_Faq
 */

class Parth_Faq_Adminhtml_FaqgridController extends Mage_Adminhtml_Controller_Action {

	protected function _isAllowed() {
		return Mage::getSingleton('admin/session')->isAllowed('faq/faqgrid');
	}

	public function indexAction() {
		$this->loadLayout();
		$this->_title($this->__("Faq"));
		$this->renderLayout();
	}

	public function editAction() {
		$faqId = $this->getRequest()->getParam('id');
		$faqModel = Mage::getModel('faq/faqgrid')->load($faqId);

		if ($faqModel->getId() || $faqId == 0) {

			Mage::register('faq_data', $faqModel);
			$this->loadLayout();
			$this->_setActiveMenu('faq/faqgrid');
			$this->_addBreadcrumb($this->__('New Faq'), $this->__('New Faq'));

			$this->getLayout()->getBlock('head')
			  ->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()
			  ->createBlock('faq/adminhtml_faqgrid_edit'))
			  ->_addLeft($this->getLayout()
			  ->createBlock('faq/adminhtml_faqgrid_edit_tabs')
			);

			$this->renderLayout();
		}	else {
			Mage::getSingleton('adminhtml/session')->addError('Films does not exist');
			$this->_redirect('*/*/');
		}
	}

	public function newAction()	{
		$this->_forward('edit');
	}

	public function saveAction() {
		if ($this->getRequest()->getPost()) {
			try {
				$postData = $this->getRequest()->getPost();
				$faqModel = Mage::getModel('faq/faqgrid');
				
				if( $this->getRequest()->getParam('id') <= 0 ) {
					$faqModel->setCreatedAt( Mage::getSingleton('core/date')->gmtDate() );
				}

				$faqModel
				->addData($postData)
				->setUpdatedAt( Mage::getSingleton('core/date')->gmtDate())
				->setId($this->getRequest()->getParam('id'))
				->save();

				Mage::getSingleton('adminhtml/session')->addSuccess('successfully saved');
				Mage::getSingleton('adminhtml/session')->setfilmsData(false);
				$this->_redirect('*/*/');
				return;
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				Mage::getSingleton('adminhtml/session')->setfaqData($this->getRequest()->getPost());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
				return;
			}
			$this->_redirect('*/*/');
		}
	}

	public function deleteAction() {
		if($this->getRequest()->getParam('id') > 0) {
			try {
				$faqModel = Mage::getModel('faq/faqgrid');
				$faqModel->setId($this->getRequest()->getParam('id'))->delete();
				Mage::getSingleton('adminhtml/session')->addSuccess('successfully deleted');
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		
		$this->_redirect('*/*/');
	}
}