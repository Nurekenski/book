<?php
class Model_Admin extends Model
{
	public function auth($login,$password)
	{	
		$stmt = $this->pdo->prepare("SELECT * FROM user WHERE login = ?");
		if(isset($_POST['login'])) {
			$stmt->execute([$_POST['login']]);
			$user = $stmt->fetch();
			$id = uniqid("T");
			if ($user &&  md5($password)==$user['password'])
			{
				setcookie("admin", $id, time() + 3600);
				session_start();
				$_SESSION["admin"] = $id;
				return true;
			} else {
				return false;
			}
		}
	}

	private function selectForPagination($start,$end) {
		$finish = [];
		$arr = [];
		foreach($_SESSION["all_dataset"] as $key=>$value){
			if($start<=$value->id && $end>=$value->id) {
				$arr[$key] = $value;
				array_push($finish,$arr[$key]);
			}
		}
		return $finish;
	}

	public function data($page) {
		if($page["next"]>0 && $page["boolean"]=="true" ) {
			return $this->selectForPagination($this->paginationAlgorithm()["start"][$page["next"]-1]+1,$this->paginationAlgorithm()["end"][$page["next"]-1]);
		}
		else if ($page["back"]>0 && $page["boolean"]=="false" ) {
			return $this->selectForPagination($this->paginationAlgorithm()["start"][$page["back"]]+1,$this->paginationAlgorithm()["end"][$page["back"]]);
		}
		else {
			return $this->selectForPagination($this->paginationAlgorithm()["start"][$page["back"]]+1,$this->paginationAlgorithm()["end"][$page["back"]]);
		}
	}

	public function updateTask($id,$username,$email,$text,$status)
	{	
		$query = $this->pdo->query('UPDATE information
		SET username = "'.$username.'", text= "'.$text.'",email="'.$email.'",status="'.$status.'"
		WHERE id = "'.$id.'"');
		$result = $query->fetch();
		if($query) {	
			return true;
		}
		return "Unfortunately failed";
	}
}