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
        	if ($user == NULL)
        	{
        		return FALSE;
        	}
        	else
        	{
        		$_SESSION['id'] = $user['id'];
        		return TRUE;
        	}
        }
    }
?>
