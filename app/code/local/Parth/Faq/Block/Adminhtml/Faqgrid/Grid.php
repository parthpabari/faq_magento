<?php

/**
 * @author Parth Pabari
 * @copyright Copyright (c) 2019 Parth Pabari
 * @package Parth_Faq
 */

class Parth_Faq_Block_Adminhtml_Faqgrid_Grid extends Mage_Adminhtml_Block_Widget_Grid {
	
	public function __construct()	{
		parent::__construct();
		$this->setDefaultSort('id');
		$this->setId('faq_faqgrid_grid');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);
	}
	 
	protected function _getCollectionClass() {
		return 'faq/faqgrid_collection';
	}
	 
	protected function _prepareCollection() {
		$collection = Mage::getResourceModel($this->_getCollectionClass());
		$this->setCollection($collection);		 
		return parent::_prepareCollection();
	}
	 
	protected function _prepareColumns() {

		$this->addColumn('id',
			array(
				'header'=> $this->__('ID'),
				'align' =>'right',
				'width' => '50px',
				'index' => 'id'
			)
		);
		 
		$this->addColumn('name',
			array(
				'header'=> $this->__('Name'),
				'index' => 'name'
			)
		);

		$this->addColumn('title',
			array(
				'header'=> $this->__('Title'),
				'index' => 'title'
			)
		);

		$this->addColumn('description',
			array(
				'header'=> $this->__('Description'),
				'index' => 'description'
			)
		);

		$this->addColumn('created_at',
			array(
				'header'=> $this->__('Created At'),
				'index' => 'created_at'
			)
		);

		$this->addColumn('updated_at',
			array(
				'header'=> $this->__('Updated At'),
				'index' => 'updated_at'
			)
		);   

		$this->addColumn('status',
			array(
				'header'=> $this->__('Status'),
				'index' => 'status',
				'renderer'  =>  'faq/adminhtml_faqgrid_grid_renderer_status'
			)
		);

		$this->addColumn('action', array(
			'header' => $this->__('Actions'),
			'align' => 'left',
			'index' => 'action',
			'renderer'	=>	'faq/adminhtml_faqgrid_grid_renderer_action'
		));

		return parent::_prepareColumns();
	}    

	public function getRowUrl($row)	{
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}
}