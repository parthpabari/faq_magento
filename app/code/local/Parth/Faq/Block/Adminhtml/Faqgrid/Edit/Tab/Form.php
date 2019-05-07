<?php

/**
 * @author Parth Pabari
 * @copyright Copyright (c) 2019 Parth Pabari
 * @package Parth_Faq
 */

class Parth_Faq_Block_Adminhtml_Faqgrid_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

	protected function _prepareForm() {

		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('faq_form', array('legend'=>'Add/Edit Faq'));
		
		$fieldset->addField('name', 'text',
			array(
				'label' => 'Name',
				'class' => 'required-entry',
				'required' => true,
				'name' => 'name',
			)
		);
		
		$fieldset->addField('title', 'text',
			array(
				'label' => 'Title',
				'class' => 'required-entry',
				'required' => true,
				'name' => 'title',
			)
		);

		$fieldset->addField('description', 'textarea',
			array(
				'label' => 'Description',
				'class' => 'required-entry',
				'required' => true,
				'name' => 'description',
			)
		);	
		
		$fieldset->addField('status', 'select',
			array(
				'label' => 'Status',
				'class' => 'required-entry',
				'required' => true,
				'name' => 'status',
				'values' => array('1' => 'Enable','2' => 'Disable'), // can be dynamic but as of now using static
			)
		);	

		if ( Mage::registry('faq_data') ){
			$form->setValues(Mage::registry('faq_data')->getData());
		}
		
		return parent::_prepareForm();
	}
}