<?php
 
class Inchoo_Orders_Adminhtml_OrderController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('EDPA'))->_title($this->__('Brand promoter'));
        $this->loadLayout();
        $this->_setActiveMenu('edpa/promotor');
        $this->_addContent($this->getLayout()->createBlock('inchoo_orders/adminhtml_sales_order'));
        $this->renderLayout();
    }

//////////////////////////////////////
// CREATE BLOCK GRID
//////////////////////////////////////
	 
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
        $this->getLayout()->createBlock('inchoo_orders/adminhtml_sales_order_grid')->toHtml()
        );
    }

//////////////////////////////////////
// EXPORT into CSV
//////////////////////////////////////
	
    public function exportInchooCsvAction()
    {
        $fileName = 'orders_inchoo.csv';
        $grid = $this->getLayout()->createBlock('inchoo_orders/adminhtml_sales_order_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

//////////////////////////////////////
// EXPORT into XML
//////////////////////////////////////
	 
    public function exportInchooExcelAction()
    {
        $fileName = 'orders_inchoo.xml';
        $grid = $this->getLayout()->createBlock('inchoo_orders/adminhtml_sales_order_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }

//////////////////////////////////////
// ACTION
//////////////////////////////////////
	public function editAction()
    {
		$this->loadLayout();
		$this->getLayout()->createBlock('inchoo_orders/adminhtml_sales_order_grid');
		
		echo "Here i'm - OrderController editAction";

		$this->renderLayout();
    }
	
}