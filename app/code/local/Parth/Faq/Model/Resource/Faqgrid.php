<?php

/**
 * @author Parth Pabari
 * @copyright Copyright (c) 2019 Parth Pabari
 * @package Parth_Faq
 */

class Parth_Faq_Model_Resource_Faqgrid extends Mage_Core_Model_Resource_Db_Abstract {
	
	protected function _construct()	{  
		$this->_init('faq/faqgrid', 'id');
	}
}