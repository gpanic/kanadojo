<?php

    class RegisterController
    {
        public $template = 'register';
        public $title = 'Kana Dojo - Register';

        public function main(array $getVars)
        {
            $view = new ViewModel($this->template);
            $view->assign("page", $this->template);
            $view->assign("title", $this->title);
        }

        public function post(array $post)
        {
            $view = new ViewModel($this->template);
            $view->assign("page", $this->template);
            $view->assign("title", $this->title);

            $model = new RegisterModel();

            if ($post['username'] != '' &&
                $post['email'] != '' &&
                $post['password'] != '' &&
                $post['confirmation'] != '')
            {
                if ($post['password'] == $post['confirmation'])
                {
                    try {
                        $model->insertUser($post['username'], $post['email'], $post['password']);
                        header("Location: /kanadojo/?login");
                        exit;
                    }
                    catch (MeekroDBException $e)
                    {
                        $view->assign("errorMessage", "Username or email already exists.");;
                    }
                }
                else
                {
                    $view->assign("passwordError", TRUE);
                    $view->assign("confirmationError", TRUE);
                    $view->assign("errorMessage", "The password and confirmation do not match.");
                }
            }
            else
            {
                if ($post['username'] == '')
                {
                    $view->assign("usernameError", TRUE);
                }
                if ($post['email'] == '')
                {
                    $view->assign("emailError", TRUE);
                }
                if ($post['password'] == '')
                {
                    $view->assign("passwordError", TRUE);
                }
                if ($post['confirmation'] == '')
                {
                    $view->assign("confirmationError", TRUE);
                }
                $view->assign("errorMessage", "Please fill out all the required fields.");
            }
        }
    }
?>
