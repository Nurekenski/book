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

	public function run_auth()
	{
		if(isset($_POST['login']) && isset($_POST['password'])) {
			$boolean = $this->model->auth($_POST['login'],$_POST['password']);
		}
	}
	function action_index()
	{
		$this->run_auth();
		// Проверяет при сортировке
		if(isset($_COOKIE['admin']) && isset($_POST["id"])) {
			if(isset($_POST["status"]) && $_POST["status"]=="on") {
				$_POST["status"] = 1;
			}
			else {
				$_POST["status"] = 0;
			}
			$data = $this->model->updateTask($_POST["id"],$_POST["username"],$_POST["email"],$_POST["text"],$_POST["status"]);
			
			if($data) {
				return $this->getDataForPagination();
			}    
		}
		// Если админ
		else if(!empty($_COOKIE['admin']) || isset($_SESSION["admin"])) {	
			return $this->getDataForPagination();
		}
		// Если не админ
		else {
			return header("Location: /");
		}
	}
}
?>