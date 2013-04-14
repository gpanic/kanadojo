<?php
	include "/config.php";

    class RegisterModel
    {
        public function __construct()
        {
        }

        public function insertUser($username, $email, $password)
        {
        	DB::insert('users', array(
        		'username' => $username,
        		'email' => $email,
        		'password' => hash("sha256", $password)
    		));
        }
    }
?>
