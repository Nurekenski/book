<?php
class Model
{
        function __construct()
        {
            $this->pdo = new PDO(
             
   "mysql:host=o3iyl77734b9n3tg.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=lyiwssei3j3n8cxo;charset=utf8", 
              "za01nv7v556isrzg", "b0wdepn8u0pd7ykj",[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
              ]
            );
        }
        public function paginationAlgorithm() {
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

            return [
              "start" => $start,
              "end" => $end
            ];
        }
      
}