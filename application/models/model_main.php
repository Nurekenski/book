<?php
class Model_Main extends Model
{
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
	private function SelectWhenSort($column,$sort,$back_next) {
		$query = $this->pdo->query('SELECT * FROM information where id between  '.($this->paginationAlgorithm()["start"][$back_next["back"]]+1)." and ".$this->paginationAlgorithm()["end"][$back_next["back"]].'  ORDER BY  '.$column.' '.$sort);
		$result = $query->fetchAll(PDO::FETCH_CLASS);
		if($query){	
			return $result;
		}
		return "Unfortunately failed";
	}
	public function TypeOfSort($type_sort,$back_next)
	{	
		if($type_sort == "u_asc") {
			return $this->SelectWhenSort("username","ASC",$back_next);
		}
		if($type_sort == "u_desc") {
			return $this->SelectWhenSort("username","DESC",$back_next);
		}
		if($type_sort == "e_asc") {
			return $this->SelectWhenSort("email","ASC",$back_next);
		}
		if($type_sort == "e_desc") {
			return $this->SelectWhenSort("email","DESC",$back_next);
		}
		if($type_sort == "s_asc") {
			return $this->SelectWhenSort("status","ASC",$back_next);
		}
		if($type_sort == "s_desc") {
			return $this->SelectWhenSort("status","DESC",$back_next);
		}
	}
}


