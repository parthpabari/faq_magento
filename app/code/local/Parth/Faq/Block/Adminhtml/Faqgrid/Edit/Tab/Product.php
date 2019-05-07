<?php

/**
 * @author Parth Pabari
 * @copyright Copyright (c) 2019 Parth Pabari
 * @package Parth_Faq
 */

class Parth_Faq_Block_Adminhtml_Faqgrid_Edit_Tab_Product extends Mage_Adminhtml_Block_Widget_Grid {

	public function __construct() {
		parent::__construct();
		$this->setId('faq_products');
		$this->setDefaultSort('entity_id');
		$this->setUseAjax(true);
	}

	protected function _addColumnFilterToCollection($column) {
		// Set custom filter for in category flag
		if ($column->getId() == 'in_faq') {
			$productIds = $this->_getSelectedProducts();
			if (empty($productIds)) {
				$productIds = 0;
			}
			if ($column->getFilter()->getValue()) {
				$this->getCollection()->addFieldToFilter('entity_id', array('in'=>$productIds));
			} else if (!empty($productIds)) {
				$this->getCollection()->addFieldToFilter('entity_id', array('nin'=>$productIds));
			}
		}
		else {
			parent::_addColumnFilterToCollection($column);
		}
		return $this;
	}

	protected function _prepareCollection() {
		
		$collection = Mage::getModel('catalog/product')->getCollection()
			->addAttributeToSelect('name')
			->addAttributeToSelect('sku')
			->addAttributeToSelect('price')
			->addStoreFilter($this->getRequest()->getParam('store'))
			->joinField('position',
				'catalog/category_product',
				'position',
				'product_id=entity_id',
				'category_id='.(int) $this->getRequest()->getParam('id', 0),
				'left');
		$this->setCollection($collection);

		return parent::_prepareCollection();
	}

	protected function _prepareColumns() {
		$this->addColumn('in_faq', array(
			'header_css_class' => 'a-center',
			'type'      => 'checkbox',
			'name'      => 'in_faq',
			'values'    => $this->_getSelectedProducts(),
			'align'     => 'center',
			'index'     => 'entity_id'
		));
		
		$this->addColumn('entity_id', array(
			'header'    => Mage::helper('catalog')->__('ID'),
			'sortable'  => true,
			'width'     => '60',
			'index'     => 'entity_id'
		));

		$this->addColumn('productname', array(
			'header'    => Mage::helper('catalog')->__('Name'),
			'index'     => 'name'
		));

		$this->addColumn('sku', array(
			'header'    => Mage::helper('catalog')->__('SKU'),
			'width'     => '80',
			'index'     => 'sku'
		));

		$this->addColumn('price', array(
			'header'    => Mage::helper('catalog')->__('Price'),
			'type'  => 'currency',
			'width'     => '1',
			'currency_code' => (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE),
			'index'     => 'price'
		));

		return parent::_prepareColumns();
	}

	public function getGridUrl() {
		return $this->getUrl('*/*/grid', array('_current'=>true));
	}

	protected function _getSelectedProducts() {
		$products = $this->getRequest()->getPost('in_faq');
		return $products;
	}

}

