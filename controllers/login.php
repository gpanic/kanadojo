<?php
    class LoginController
    {
        public $template = 'login';
        public $title = 'Kana Dojo - Login';

        public function main(array $getVars)
        {
            $loginModel = new LoginModel;
            $view = new ViewModel($this->template);
            $view->assign("page", $this->template);
            $view->assign("title", $this->title);
        }

        public function post(array $post)
        {
            $view = new ViewModel($this->template);
            $view->assign("page", $this->template);
            $view->assign("title", $this->title);

            $model = new LoginModel();

            if ($post['username'] != '' &&
                $post['password'] != '')
            {
                try {
                    $result = $model->loginUser($post['username'], $post['password']);
                    if ($result)
                    {
                        header("Location: /kanadojo/");
                        exit;
                    }
                    else
                    {
                        $view->assign("errorMessage", "Incorrect username or password.");
                    }
                }
                catch (MeekroDBException $e)
                {
                    $view->assign("errorMessage", "Username or email already exists.");;
                }
            }
            else
            {
                if ($post['username'] == '')
                {
                    $view->assign("usernameError", TRUE);
                }
                if ($post['password'] == '')
                {
                    $view->assign("passwordError", TRUE);
                }
                $view->assign("errorMessage", "Please fill out all the required fields.");
            }
        }
    }
?>
