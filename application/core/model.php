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
      
}