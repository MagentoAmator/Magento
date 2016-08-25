<?php
 
class Inchoo_Orders_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('inchoo_order_grid');
        $this->setDefaultSort('increment_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
 
    protected function _prepareCollection()
    {
		$attribute = Mage::getModel('eav/entity_attribute')->loadByCode('catalog_product', 'manufacturer');
		
		$collection = Mage::getResourceModel('eav/entity_attribute_option_collection')
			->setAttributeFilter($attribute->getData('attribute_id'))
			;//->setStoreFilter(0, false);
 
        $this->setCollection($collection);
        return parent::_prepareCollection();

    }
	
    protected function _prepareColumns()
    {
        $helper = Mage::helper('inchoo_orders');
	
        $this->addColumn('show_hide',
		array(
            'header'  => 'Show/Hide (Yes/No)',
			'width'   => '10px',
            'index'   => 'show_hide',
			'options'  => $this->getData('show_hide'),
		));

//		$this->addColumn('action',
//      array(
//          'header'    => Mage::helper('inchoo_orders')->__('Action'),
//          'width'     => '50px',
//          'type'      => 'action',
//          'getter'     => 'getId',
//          'actions'   => array(
//              array(
//                  'caption' => Mage::helper('inchoo_orders')->__('Edit'),
//                  'url'     => array(
//                      'base'=>'*/*/edit',
//                      'params'=>array('store'=>$this->getRequest()->getParam('store'))
//                  ),
//                  'field'   => 'id'
//              )
//          ),
//		));

        $this->addExportType('*/*/exportEDPACsv', $helper->__('CSV'));
        $this->addExportType('*/*/exportEDPAXml', $helper->__('XML'));
 
        return parent::_prepareColumns();
    }
	
	public function getSaveUrl()
	{
		return $this->getUrl('*/grid/save');
	}
	
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}
