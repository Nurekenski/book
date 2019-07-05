<?php
class Model_Edit extends Model
{
	public function get($id)
	{			
		$query = $this->pdo->query('SELECT * FROM information where id='.$id.'');
		$result = $query->fetch();
		if($query){
			return $result;
		}
		return "Unfortunately failed";
	}
	private function select($column,$sort,$back_next) {
	
		$query = $this->pdo->query('SELECT * FROM information where id between  '.($start[$back_next["back"]]+1)." and ".$end[$back_next["back"]].'  ORDER BY  '.$column.' '.$sort);
		$result = $query->fetchAll(PDO::FETCH_CLASS);
		if($query){	
			return $result;
		}
		return "Unfortunately failed";
	}
	
}


