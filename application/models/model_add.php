<?php
class Model_Add extends Model
{
	public function insert($username,$email,$text)
	{	
		$stmt = $this->pdo->query('INSERT INTO information(username,email,text) values("'.$username.'","'.$email.'","'.$text.'")');
		
		if($stmt){
			return "Succesfully registered";
		}
		else {
			return "Unfortunately failed";
		}
	}
}


