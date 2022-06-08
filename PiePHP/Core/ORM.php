<?php
    namespace Core;
    use Core\Database;
    class ORM{
        public $connect;
        public $db;
        public function __construct()
        {
            $this->db = new Database;
            $this->connect = $this->db->connect();
        }
    
        public function create($table, $fields) {
            $end = array_key_last($fields);
            $endV = end($fields);
            $requette = "insert into $table (";
            foreach ($fields as $k => $v){
                if($k === $end ){
                    $requette .= "$k) Values (";
                }else{
                    $requette .= "$k,";
                }
            }
            foreach ($fields as $k => $v){
                if($v === $endV){
                    $requette .= "'$v');";
                }else{
                    $requette .= "'$v',";
                }
            }
            $this->connect->query($requette);
            return $this->connect->Lastinsertid();
        }
        
        public function update(){
        
        }
    
        public function read($table, $id) {
             $requette = "select * from $table where id = $id;";
            return $this->connect->query($requette)->fetch(\PDO::FETCH_ASSOC);
        }
    
        public function delete ( $table , $id ) {
            $requette = "delete from $table where id = $id;";
            return $this->connect->query($requette)->fetch(\PDO::FETCH_ASSOC);
        }
    
        public function find($table, $parmas = array('where'=>'1','order by'=>'id asc','limit'=>'1')){
    
            $requette = "select * from $table ";
            $first = array_key_first($parmas);
            foreach ($parmas as $k => $v){
                if($k === $first){
                    $requette .= "$k id = $v ";
                }else{
                    $requette .= "$k $v ";
                }
        
            }
            return $this->connect->query($requette)->fetch(\PDO::FETCH_ASSOC);
        }
    }
    
    
  