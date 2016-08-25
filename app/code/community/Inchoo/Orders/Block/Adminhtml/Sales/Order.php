<?php
/*

* @category	Maintenance

* @package		AMBeR_Brand

* @author		AMBeR

* @date        	12-07-2016

* @last edit   	12-07-2016

* @copyright	Copyright 2016 AMBeR

*/
 
class Inchoo_Orders_Block_Adminhtml_Sales_Order extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'inchoo_orders';
        $this->_controller = 'adminhtml_sales_order';
        $this->_headerText = Mage::helper('inchoo_orders')->__('EDPA controller');
 
        parent::__construct();
		
        $this->_removeButton('add');
/* 	    $this->_removeButton('save');
		$this->_removeButton('delete');
		$this->_removeButton('reset');	
		$this->_removeButton('search');	 */
    }
}