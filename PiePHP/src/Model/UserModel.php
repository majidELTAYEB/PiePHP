<?php
    namespace src\Model;
    
    use Core\Database;

    class UserModel{
        private $email;
        private $password;
        public $connect;
        public function __construct()
        {
            $connection = new Database();
            $this->connect = $connection->connect();
        }

        public function setEmail($email){
            $this->email = $email;
        }
        public function getEmail(){
            return $this->email;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function getPassword(){
            return $this->password;
        }
        
        public function save(){
            $sqlQuery = "insert into PiePHP.users (email ,password)
                        values ('$this->email','$this->password');";
    
            $this->connect->query($sqlQuery);
            
        }
        
        public function connexion(){
            $sqlQuery = "select * from PiePHP.users where email='$this->email';";
            return $this->connect->query($sqlQuery)->fetch(\PDO::FETCH_ASSOC);
        }
        
        public function read($id){
            $sqlQuery = "select * from PiePHP.users where email=$id;";
            return $this->connect->query($sqlQuery)->fetch(\PDO::FETCH_ASSOC);
        }
        
        public function updatEmail($id,$email){
            $sqlQuery = "update PiePHP.users set email = $email where id = $id;";
             $this->connect->query($sqlQuery);
             return true;
        }
        
        public function updatePass($id,$pass){
            $sqlQuery = "update PiePHP.users set password = $pass where id = $id;";
            $this->connect->query($sqlQuery);
            return true;
        }
        
        public function delete($id){
            $sqlQuery = "delete from PiePHP.users where id = $id;";
            $this->connect->query($sqlQuery);
            return true;
        }
         public function read_all(){
             $sqlQuery = "select * from PiePHP.users;";
             return $this->connect->query($sqlQuery)->fetch(\PDO::FETCH_ASSOC);
         }
    
    }