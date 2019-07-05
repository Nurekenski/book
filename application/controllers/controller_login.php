<?php
class Controller_Login extends Controller
{
	function __construct()
	{
		$this->model = new Model_login();
		$this->view = new View();
    }
    
	function action_index()
	{	
        $this->view->generate('login_view.php', 'template_view.php');
	}
}
?>