<?php

/**
 * @author Parth Pabari
 * @copyright Copyright (c) 2019 Parth Pabari
 * @package Parth_Faq
 */

class Parth_Faq_Block_Adminhtml_Faqgrid_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
	
	public function __construct()	{
		parent::__construct();
		$this->_objectId = 'id';
		$this->_controller = 'adminhtml_faqgrid';
		$this->_blockGroup = 'faq';

		$this->_updateButton('save', 'label', $this->__('Save'));
		$this->_updateButton('delete', 'label', $this->__('Delete'));
	}

	public function getHeaderText()	{
		if(Mage::registry('faq_data') && Mage::registry('faq_data')->getId()) {
			return 'Edit Faq '.$this->htmlEscape(Mage::registry('faq_data')->getTitle());
		} else {
			return 'Add Faq';
		}
	}
}
