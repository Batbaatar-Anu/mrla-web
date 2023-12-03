<?php 
class RegisterUser {
    private $username;
    private $raw_password;
    private $encrypted_password;
    public $error;
    public $success;
    private static $STORAGE_FILE = "data.json";
    private $stored_users;
    private $new_user;

    public function __construct($username, $password, $storageFile = null){
        $this->username = trim(filter_var($username, FILTER_SANITIZE_STRING));
        $this->raw_password = trim(filter_var($password, FILTER_SANITIZE_STRING));
        $this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

        $this->stored_users = json_decode(file_get_contents($storageFile ?? self::$STORAGE_FILE), true);

        if ($this->checkFieldValues() && !$this->usernameExists()) {
            $this->insertUser();
        }
    }

    private function checkFieldValues(){
        if (empty($this->username) || empty($this->raw_password)){
            $this->error = "Both fields are required.";
            return false;
        } else {
            return true;
        }
    }

    private function usernameExists(){
        foreach ($this->stored_users as $user){
            if ($this->username == $user["username"]){
                $this->error = "Username already taken.";
                return true;
            }
        }
        return false;
    }

    private function insertUser(){
        array_push($this->stored_users, $this->new_user);

        if (file_put_contents(self::$STORAGE_FILE, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
            $this->success = "Successfully registered.";
        } else {
            throw new Exception("Failed to register.");
        }
    }
}
?>
