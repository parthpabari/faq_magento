<?php

/**
 * @author Parth Pabari
 * @copyright Copyright (c) 2019 Parth Pabari
 * @package Parth_Faq
 */

class Parth_Faq_Block_Adminhtml_Faqgrid_Grid_Renderer_Status extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Action {
	
	public function render(Varien_Object $row) {
		// Since used static, putting static condition, this can be dynamic.
		if($row->getStatus()==1){
			return 'Enable';
		} else {
			return 'Disable';
		}
	}
}