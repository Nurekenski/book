<?php
class Controller_add extends Controller
{

    function __construct()
	{
		$this->model = new Model_Add();
		$this->view = new View();
    }
    
	function action_index()
	{	
		if(isset($_POST['username']) && isset($_POST['email']))
		{	
			$data = $this->model->insert($_POST['username'],$_POST['email'],$_POST['text']);
		}
		else {
			$data = " ";
		}
		$this->view->generate('add_view.php', 'template_view.php',$data);
	}
	
}