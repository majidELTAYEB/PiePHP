<?php
    namespace Controller;
    use \Core\Controller;
    use Core\ORM;
    use src\Model\UserModel;
    use Core\Database;

    class UserController extends Controller{
        
        function addAction(){
        $this->render('register');
     }
     
     function loginAction(){
         $this->render('login');
     }

     public function registerAction(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $action = new ORM();
       $hehe =  $action->create('users',['email'=>'momo','password'=>'hehe']);
        var_dump($hehe);
        //$action = new UserModel;
       // $action->setEmail($email);
       // $action->setPassword($password);
      //  $action->save();
        
        //header('Location: http://localhost/PiePHP/User/login');
        
    }
    
    public function connexionAction(){
           $email = $_POST['email'];
           $password = $_POST['password'];
           $action = new UserModel();
           $action->setEmail($email);
           $action->setPassword($password);
           $id = $action->connexion();
           
           if($id['email'] === $email){
               session_start();
               $_SESSION['email'] = $email;
               $_SESSION['id'] = $id['id'];
           }
           
    }
   }