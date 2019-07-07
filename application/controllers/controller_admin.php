<?php
class Controller_Admin extends Controller
{
	function __construct()
	{
		$this->model = new Model_admin();
		$this->view = new View();
    }
	
	private function getDataForPagination() {

		if(isset($_GET['next'])){
			$nb = [
				"next" => (int)$_GET['next']+1,
				"boolean" => "true",
				"back" => (int)$_GET['next']
			];
			$data = $this->model->data($nb);
			$this->view->generate('admin_view.php', 'template_view.php',$data,$nb);
		}
		else if(isset($_GET['back'])) {
			$nb = [
				"next" => (int)$_GET['back'],
				"boolean" => "false",
				"back" => (int)$_GET['back']-1
			];
			$data = $this->model->data($nb);
			
			$this->view->generate('admin_view.php', 'template_view.php',$data,$nb);
		}
		else if(isset($_POST["back_page"])) {
			$nb = [
				"next" => $_POST["next_page"],
				"boolean" => "nothing",
				"back" => $_POST["back_page"]
			];
			$data = $this->model->data($nb);
			$this->view->generate('admin_view.php', 'template_view.php',$data,$nb);
		}
		else {
			$nb = [
				"next" => 1,
				"boolean" => "nothing",
				"back" => 0
			];
			$data = $this->model->data($nb);
			$this->view->generate('admin_view.php', 'template_view.php',$data,$nb);
		}
	}

	function action_index()
	{	
		$boolean = $this->model->auth(isset($_POST['login'])?:$_POST['login'],isset($_POST['password'])?:$_POST['password']);
		if(isset($_COOKIE['admin']) && isset($_POST["id"])) { 
			// echo $_POST["back_page"]."  ".$_POST["next_page"];
			if($_POST["status"]=="on") {
				$_POST["status"] = 1;
			}
			else {
				$_POST["status"] = 0;
			}
			$data = $this->model->update($_POST["id"],$_POST["username"],$_POST["email"],$_POST["text"],$_POST["status"]);
			
			if($data) {
				return $this->getDataForPagination();
			}    
		}
	
		else if(!empty($_COOKIE['admin']) || isset($_SESSION["admin"])) {	
			return $this->getDataForPagination();
		}
		else {
			return header("Location: /");
		}
	}
}
?>