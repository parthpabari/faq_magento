<?php

/**
 * @author Parth Pabari
 * @copyright Copyright (c) 2019 Parth Pabari
 * @package Parth_Faq
 */

class Parth_Faq_Block_Adminhtml_Faqgrid extends Mage_Adminhtml_Block_Widget_Grid_Container {
	
	public function __construct() {
		$this->_blockGroup = 'faq';
		$this->_controller = 'adminhtml_faqgrid';
		$this->_headerText = $this->__('Grid');
		parent::__construct();
	}
}