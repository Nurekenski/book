<?php
class Model_Main extends Model
{
	private function selecting($start,$end) {
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
		$pivot = 3;
		$query = $this->pdo->query('SELECT * FROM information');	
		$result = $query->fetchAll(PDO::FETCH_CLASS);

		$_SESSION["all_dataset"] = $result;
	
		$all_datas = sizeof($result);
		$all_data = sizeof($result);

		$array = [];
		while($all_data>3) {
			$all_data = $all_data - $pivot;
			array_push($array,$pivot);
		}
		array_push($array,$all_datas-array_sum($array));
		$start = [0];
		$end = [$pivot];
		$x = 1;
		while ($x<sizeof($array)) {
			$x++;
			array_push($end,$end[$x-2]+$array[$x-1]);
			array_push($start,$end[$x-1]-$array[$x-1]);
		}
		setcookie("alldata",sizeof($start));

		if($page["next"]>0 && $page["boolean"]=="true" ) {
			// echo "first performed sdfsdf";
			// var_dump($start);
			// echo "<br>";
			// var_dump($end);
			// echo "<br>";
			// echo $page["next"];
			return $this->selecting($start[$page["next"]-1]+1,$end[$page["next"]-1]);
			// $query = $this->pdo->query('SELECT * FROM information where id between '.($start[$page["next"]-1]+1)." and ".($end[$page["next"]-1]));	
			// $result = $query->fetchAll(PDO::FETCH_CLASS);
			// return $result;
		}
		else if ($page["back"]>0 && $page["boolean"]=="false" ) {
			// echo "<br>";
			// echo "second performed";
			// echo "<br>";
			// var_dump($start);
			// echo "<br>";
			// var_dump($end);
			// echo "<br>";
			// echo $page["back"];
			// echo "<br>";
			// echo $start[$page["back"]-1]."   ".$end[$page["back"]-1];
			return $this->selecting($start[$page["back"]]+1,$end[$page["back"]]);
			// $query = $this->pdo->query('SELECT * FROM information where id between '.($start[$page["back"]]+1)." and ".($end[$page["back"]]));	
			// $result = $query->fetchAll(PDO::FETCH_CLASS);
			// return $result;
		}
		else {
		
			// echo "performed there else<br>";
			// var_dump($start);
			// echo "<br>";
			// var_dump($end);
			// echo "<br>";
			// echo $page["back"]."   ".$page["next"];
			// echo "thsdfsdf";
			// echo $page["back"]."   ----   ".$page["back"];
			// echo ($start[$page["next"]]+1)."   ".$end[$page["next"]];
			return $this->selecting($start[$page["back"]]+1,$end[$page["back"]]);
			// $query = $this->pdo->query('SELECT * FROM information where id between '.($start[$page["back"]])." and ".($end[$page["back"]]));	
			// $result = $query->fetchAll(PDO::FETCH_CLASS);
			// return $result;
		}
	}
	private function select($column,$sort,$back_next) {
		$pivot = 3;
		$query = $this->pdo->query('SELECT * FROM information');	
		$result = $query->fetchAll(PDO::FETCH_CLASS);
		
		$all_datas = sizeof($result);
		$all_data = sizeof($result);

		$array = [];
		while($all_data>4) {
			$all_data = $all_data - $pivot;
			array_push($array,$pivot);
		}
		array_push($array,$all_datas-array_sum($array));
		$start = [0];
		$end = [$pivot];
		$x = 1;
		while ($x<sizeof($array)) {
			$x++;
			array_push($end,$end[$x-2]+$array[$x-1]);
			array_push($start,$end[$x-1]-$array[$x-1]);
		}
		
		$query = $this->pdo->query('SELECT * FROM information where id between  '.($start[$back_next["back"]]+1)." and ".$end[$back_next["back"]].'  ORDER BY  '.$column.' '.$sort);
		$result = $query->fetchAll(PDO::FETCH_CLASS);
		if($query){	
			return $result;
		}
		return "Unfortunately failed";
	}
	public function sort($type_sort,$back_next)
	{	
		if($type_sort == "u_asc") {
			return $this->select("username","ASC",$back_next);
		}
		if($type_sort == "u_desc") {
			return $this->select("username","DESC",$back_next);
		}
		if($type_sort == "e_asc") {
			return $this->select("email","ASC",$back_next);
		}
		if($type_sort == "e_desc") {
			return $this->select("email","DESC",$back_next);
		}
		if($type_sort == "s_asc") {
			return $this->select("status","ASC",$back_next);
		}
		if($type_sort == "s_desc") {
			return $this->select("status","DESC",$back_next);
		}
	}
}


