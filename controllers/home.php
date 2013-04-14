<?php
    class HomeController
    {
        public $template = 'home';
        public $title = 'Kana Dojo';

        public function main(array $getVars)
        {
            $view = new ViewModel($this->template);
            $view->assign("page", $this->template);
            $view->assign("title", $this->title);
        }
    }
?>
