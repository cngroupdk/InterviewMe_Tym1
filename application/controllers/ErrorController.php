<?php
/**
 * Controller pro odchytavani a vypis chybovych stavu
 *
 */
class ErrorController extends Zend_Controller_Action {
	
	/**
	 * Odchytavani a vypis chybovych stavu
	 *
	 */
	public function errorAction() {
		
		$errors = $this->_getParam('error_handler');
		
	        
		switch ($errors->type) {
			 
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
				
				// stranka nebyla nalezena - HTTP chybova hlaska 404
				$this->getResponse()->setHttpResponseCode(404);
				$this->view->message = 'Stránka nenalezena';
				break;
				
			default:
				
				// chyba v aplikaci - HTTP chybova hlaska 500
				$this->getResponse()->setHttpResponseCode(500);
				$this->view->message = 'Chyba v aplikaci';
				break;
				
		}
	
		$this->view->env = APPLICATION_ENV;
		$this->view->exception = $errors->exception;
		$this->view->request   = $errors->request;
		$this->view->assign('title', 'Objevila se chyba');
		
		$this->_helper->layout->setLayout('error');
		
	}
	
}

?>