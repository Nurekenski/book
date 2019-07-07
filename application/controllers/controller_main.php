<?php
class Controller_Main extends Controller
{
	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}
	
	/*----For pagination----*/ 
    private function getDataForPagination() {
		if(isset($_GET['next'])){
			$nb = [
				"next" => (int)$_GET['next']+1,
				"boolean" => "true",
				"back" => (int)$_GET['next']
			];
			$data = $this->model->data($nb);
			$this->view->generate('main_view.php', 'template_view.php',$data,$nb);
		}
		else if(isset($_GET['back'])) {
			$nb = [
				"next" => (int)$_GET['back'],
				"boolean" => "false",
				"back" => (int)$_GET['back']-1
			];
			$data = $this->model->data($nb);
			$this->view->generate('main_view.php', 'template_view.php',$data,$nb);
		}
		else {
			$nb = [
				"next" => 1,
				"boolean" => "nothing",
				"back" => 0
			];
			$data = $this->model->data($nb);
			$this->view->generate('main_view.php', 'template_view.php',$data,$nb);
		}
	}

	/*----For pagination----*/ 
	private function defaultPage($next,$back) {
		return $nb = [
			"back" => $next,
			"boolean" => "nothing",
			"next" => $back
		];
	}
	
	function action_index()
	{	
		if(isset($_GET['sort']) && $_GET['sort']=="u_asc") {
			$data = $this->model->sort("u_asc",$this->defaultPage($_GET['back_page'],$_GET['next_page']));
			$this->view->generate('main_view.php', 'template_view.php',$data,$this->defaultPage($_GET['back_page'],$_GET['next_page']));
		}
		else if(isset($_GET['sort']) && $_GET['sort']=="u_desc") {
			$data = $this->model->sort("u_desc",$this->defaultPage($_GET['back_page'],$_GET['next_page']));
			$this->view->generate('main_view.php', 'template_view.php',$data,$this->defaultPage($_GET['back_page'],$_GET['next_page']));
		}
		else if(isset($_GET['sort']) && $_GET['sort']=="e_desc") {
			$data = $this->model->sort("e_desc",$this->defaultPage($_GET['back_page'],$_GET['next_page']));
			$this->view->generate('main_view.php', 'template_view.php',$data,$this->defaultPage($_GET['back_page'],$_GET['next_page']));
		}
		else if(isset($_GET['sort']) && $_GET['sort']=="e_asc") {
			$data = $this->model->sort("e_asc",$this->defaultPage($_GET['back_page'],$_GET['next_page']));
			$this->view->generate('main_view.php', 'template_view.php',$data,$this->defaultPage($_GET['back_page'],$_GET['next_page']));
		}
		else if(isset($_GET['sort']) && $_GET['sort']=="s_asc") {
			$data = $this->model->sort("s_asc",$this->defaultPage($_GET['back_page'],$_GET['next_page']));
			$this->view->generate('main_view.php', 'template_view.php',$data,$this->defaultPage($_GET['back_page'],$_GET['next_page']));
		}
		else if(isset($_GET['sort']) && $_GET['sort']=="s_desc") {
			$data = $this->model->sort("s_desc",$this->defaultPage($_GET['back_page'],$_GET['next_page']));
			$this->view->generate('main_view.php', 'template_view.php',$data,$this->defaultPage($_GET['back_page'],$_GET['next_page']));
		}
		else if($_POST["action"]=="logout") {
			setcookie("admin", "", time()-3600);
			setcookie("PHPSESSID", "", time()-3600);
			unset($_SESSION["admin"]);
			return $this->getDataForPagination();
		}
		else {
			return $this->getDataForPagination();
		}
	}
}
?>