<?php
class LoginUser {
    private $username;
    private $password;
    public $error;
    public $success;
    private $storage = "data.json";
    private $stored_users;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;

        // Check if the file exists before attempting to decode it
        if (file_exists($this->storage)) {
            $content = file_get_contents($this->storage);

            // Check if file reading was successful
            if ($content !== false) {
                $this->stored_users = json_decode($content, true);

                // Check if JSON decoding was successful
                if (is_array($this->stored_users)) {
                    $this->login();
                } else {
                    $this->error = "Invalid JSON format in file";
                }
            } else {
                $this->error = "Failed to read file content";
            }
        } else {
            $this->error = "File does not exist";
        }
    }

    private function login() {
        foreach ($this->stored_users as $user) {
            if ($user["username"] == $this->username) {
                if (password_verify($this->password, $user["password"])) {
                    session_start();
                    $_SESSION['user'] = $this->username;
                    header("location: home.php");
                    exit();
                }
            }
        }
        $this->error = "Wrong username or password";
    }
}
?>
