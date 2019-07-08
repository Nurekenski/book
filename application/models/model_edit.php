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
}


