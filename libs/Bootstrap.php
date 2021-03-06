<?php
class Bootstrap
{

	private $_params;
	private $_controllerObject;

	public function init()
	{
		$this->setParam();

		$controllerName	= ucfirst($this->_params['controller']) . 'Controller';
		$filePath	= MODULE_PATH . $this->_params['module'] . DS . 'controllers' . DS . $controllerName . '.php';

		if (file_exists($filePath)) {
			$this->loadExistingController($filePath, $controllerName);
			$this->callMethod();
		} else {
			URL::redirect('default', 'index', 'notice', array('type' => 'not-url'));
			// URL::redirect('default', 'index', 'notice', array('type' => 'not-url'));
		}
	}

	// CALL METHODE
	private function callMethod()
	{
		$actionName = $this->_params['action'] . 'Action';
		if (method_exists($this->_controllerObject, $actionName) == true) {
			$module		= $this->_params['module'];
			$controller	= $this->_params['controller'];
			$action		= $this->_params['action'];
			$userInfo = Session::get('user');
			
			
			//KIỂM TRA TỒN TẠI ĐĂNG NHẬP VÀ THỜI GIAN ĐĂNG NHẬP
			$logged 	= (isset($userInfo)) ? ($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()) : "";
			$pageLogin 	= ($controller == 'index') && ($action == 'login'); 

			if($module == 'backend'){
				if($logged == true){
					if($userInfo['group_acp'] == 1){
						if($pageLogin == true)	URL::redirect('backend','index','index');
						if($pageLogin == false)	$this->_controllerObject->$actionName();
					}
					else{
						URL::redirect('client','index','index');
					}
				}
				else{
					Session::delete('user');
					if($pageLogin == true)	$this->_controllerObject->$actionName();
					if($pageLogin == false)	URL::redirect('backend','index','login');
				}
			}
			else if($module == 'client'){
				if($action == 'info'){
					if($logged == true){
						$this->_controllerObject->$actionName();
					}else{
						Session::delete('user');
						if($pageLogin == true)	$this->_controllerObject->$actionName();
						if($pageLogin == false)	URL::redirect('client','user','login');
					}
				}else{
					$this->_controllerObject->$actionName();
				}
			}
			$this->_controllerObject->$actionName();
		} 
		else {
			$this->_error();
		}
	}

	// SET PARAMS
	public function setParam()
	{
		$this->_params 					= array_merge($_GET, $_POST);
		$this->_params['module'] 		= isset($this->_params['module']) ? $this->_params['module'] : DEFAULT_MODULE;
		$this->_params['controller'] 	= isset($this->_params['controller']) ? $this->_params['controller'] : DEFAULT_CONTROLLER;
		$this->_params['action'] 		= isset($this->_params['action']) ? $this->_params['action'] : DEFAULT_ACTION;
	}

	// CALL ACTION LOGIN
	private function callLoginAction($module = 'default')
	{
		Session::delete('user');
		require_once(MODULE_PATH . $module . DS . 'controllers' . DS . 'IndexController.php');
		$indexController = new IndexController($this->_params);
		$indexController->loginAction();
	}

	// LOAD EXISTING CONTROLLER
	private function loadExistingController($filePath, $controllerName)
	{
		require_once $filePath;
		$this->_controllerObject = new $controllerName($this->_params);
	}

	// ERROR CONTROLLER
	public function _error()
	{
		// require_once MODULE_PATH . 'default' . DS . 'controllers' . DS . 'ErrorController.php';
		// $this->_controllerObject = new ErrorController();
		// $this->_controllerObject->setView('default');
		// $this->_controllerObject->indexAction();
	}
}
