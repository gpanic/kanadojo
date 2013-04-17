<?php
	include "/config.php";

    class LoginModel
    {
        public function __construct()
        {
        }

        public function loginUser($username, $password)
        {
        	$user = DB::queryFirstRow("SELECT id FROM users WHERE username=%s AND password=%s", $username, hash("sha256", $password));
            $settings = DB::queryFirstRow("SELECT weighted FROM settings WHERE id_user=%s", $id);
        	if ($user == NULL)
        	{
        		return FALSE;
        	}
        	else
        	{
        		$_SESSION['id'] = $user['id'];
                $_SESSION['weighted'] = $settings['weighted'];
        		return TRUE;
        	}
        }
    }
?>
