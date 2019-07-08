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
		if(isset($_GET["id"])) {	
			$data = $this->model->get($_GET["id"]);
			$this->view->generate('edit_view.php', 'template_view.php',$data);
		}
		else {
			return header("Location: /");
		}
	}

	
}
?>