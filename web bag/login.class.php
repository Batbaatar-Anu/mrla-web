<?php
class LoginUser {
    private $username;
    private $password;
    public $error;
    private $storage = "data.json";
    private $stored_users;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;

        if (!file_exists($this->storage)) {
            $this->error = "Data file not found";
            return;
        }

        $this->stored_users = json_decode(file_get_contents($this->storage), true);

        if ($this->stored_users === null) {
            $this->error = "Error decoding data file";
            return;
        }

        $this->login();
    }

    private function login(){
        foreach($this->stored_users as $user){
            if($user["username"] == $this->username){
                if(password_verify($this->password, $user["password"])){
                    $this->startSession();
                    return;
                }
            }
        } 
        $this->error = "Wrong username or password";
    }

    private function startSession(){
        session_start();
        $_SESSION['user'] = $this->username;
        header("location: https://yourdomain.com/home.php");
        exit();
    }
}
?>
