<?php 

$installer = $this; 

$installer->startSetup(); 

$table = $installer->getConnection()
	->newTable($installer->getTable('faq/faqgrid'))
	->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'identity'  => true,
		'unsigned'  => true,
		'nullable'  => false,
		'primary'   => true,
		), 'Id')
	->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'  => false,
		), 'Name')
	->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'  => false,
		), 'Title')
	->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable'  => true,
		), 'Description')
	->addColumn('in_faq', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable'  => true,
		), 'Products Id')
	->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		'nullable'  => false,
		), 'Created At')
	->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		'nullable'  => false,
		), 'Updated At')
	->addColumn('status', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
		'nullable'  => false,
		), 'Status');
$installer->getConnection()->createTable($table);

$installer->endSetup();