<?php

/**
 * @author Parth Pabari
 * @copyright Copyright (c) 2019 Parth Pabari
 * @package Parth_Faq
 */

class Parth_Faq_Block_Adminhtml_Faqgrid_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

	public function __construct()	{
		parent::__construct();
		$this->setId('faqgrid_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle('Add / Edit Faq');
	}

	protected function _beforeToHtml() {
		$this->addTab('form_section', array(
			'label' => 'Add / Edit Faq',
			'title' => 'Add / Edit Faq',
			'content' => $this->getLayout()
				->createBlock('faq/adminhtml_faqgrid_edit_tab_form')
				->toHtml()
		));
		
		$this->addTab('product_associate', array(
			'label' => 'Product Association',
			'title' => 'Product Association',
			'content' => $this->getLayout()
				->createBlock('faq/adminhtml_faqgrid_edit_tab_product','faq.product.grid')
				->toHtml()
		));
		
		return parent::_beforeToHtml();
	}
}