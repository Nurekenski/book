<?php
class Controller_Edit extends Controller
{
	function __construct()
	{
		$this->model = new Model_edit();
		$this->view = new View();
    }
    
	function action_index()
	{	
			$data = $this->model->get($_GET["id"]);
			$this->view->generate('edit_view.php', 'template_view.php',$data);
		
	}

	
}
?>