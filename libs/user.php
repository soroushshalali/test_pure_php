<?php
class user{

    function login($username , $password){
        include_once(dirname(__FILE__).'/dal.php');
        global $conn;
        connect();
        $stmt=$conn->prepare("SELECT `id` FROM `user` WHERE `username`= ? AND `password`= ? ");
        $stmt->bind_param('ss' , $username , $password);
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows > 0){
            $id=$result->fetch_assoc()['id'];
            return $id;
        }else{
            return false;
        }
    }

    function signup($username , $password  , $email){
        if(!empty($username)){
            include_once(dirname(__FILE__).'/dal.php');
            global $conn;
            connect();
            if(select('username' , $username) && select('email' , $email)){
                echo 'saved';
                $stmt=$conn->prepare("INSERT INTO `user`(`username`, `password`, `email`) VALUES (?,?,?)");
                $stmt->bind_param('sss',$username , $password , $email);
                if ($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }else{
                echo 'username or password is exist.';
            }
        }
    }

    function logout(){
        session_start();
        ob_start();
        session_destroy();
        // $_SESSION['islogin']='false';
        setcookie('islogin' , '/');
        header('location:index.php');
    }

    function isLogin(){
        if($_COOKIE['islogin'] == 'true' ){
            $_SESSION['islogin']='true';
            return 'true';
        }else{
            return 'false';
        }
    }


}
