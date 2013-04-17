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

            $id = DB::insertId();
            DB::insert('scores', array(
                'id_user' => $id
            ));
            
            DB::insert('settings', array(
                'id_user' => $id
            ));
        }
    }
?>
